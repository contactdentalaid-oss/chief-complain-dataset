<?php
declare(strict_types=1);

namespace ContactDentalAid\ChiefComplaints\Services;

use ContactDentalAid\ChiefComplaints\Repositories\ChiefComplaintRepository;
use ContactDentalAid\ChiefComplaints\Repositories\QuestionTemplateRepository;
use ContactDentalAid\ChiefComplaints\Models\ChiefComplaint;

/**
 * Chief Complaint Service
 * Business logic layer for chief complaint operations
 */
class ChiefComplaintService
{
    private ChiefComplaintRepository $complaintRepo;
    private QuestionTemplateRepository $questionRepo;

    public function __construct(
        ChiefComplaintRepository $complaintRepo,
        QuestionTemplateRepository $questionRepo
    ) {
        $this->complaintRepo = $complaintRepo;
        $this->questionRepo = $questionRepo;
    }

    /**
     * Get complaint with all associated questions
     */
    public function getComplaintWithQuestions(string $complaintId): ?array
    {
        $complaint = $this->complaintRepo->findById($complaintId);
        
        if (!$complaint) {
            return null;
        }

        $questions = $this->questionRepo->findByComplaintId($complaintId);

        return [
            'complaint' => $complaint->toArray(),
            'questions' => array_map(fn($q) => $q->toArray(), $questions),
            'question_count' => count($questions),
        ];
    }

    /**
     * Search complaints by keyword
     */
    public function searchComplaints(string $keyword, int $limit = 20): array
    {
        $results = $this->complaintRepo->findByName($keyword);
        
        return array_slice(
            array_map(fn($c) => $c->toArray(), $results),
            0,
            $limit
        );
    }

    /**
     * Get complaints suitable for age group
     */
    public function getComplaintsForAge(int $age, ?string $category = null): array
    {
        $complaints = $this->complaintRepo->findByAgeRange($age);
        
        if ($category) {
            $complaints = array_filter(
                $complaints,
                fn($c) => $c->getCategory() === $category
            );
        }

        return array_map(fn($c) => $c->toArray(), $complaints);
    }

    /**
     * Get dental complaints
     */
    public function getDentalComplaints(): array
    {
        $complaints = $this->complaintRepo->getDentalComplaints();
        return array_map(fn($c) => $c->toArray(), $complaints);
    }

    /**
     * Get emergency complaints
     */
    public function getEmergencyComplaints(): array
    {
        $complaints = $this->complaintRepo->getEmergencyComplaints();
        return array_map(fn($c) => $c->toArray(), $complaints);
    }

    /**
     * Get complaints by category
     */
    public function getComplaintsByCategory(string $category): array
    {
        $complaints = $this->complaintRepo->findByCategory($category);
        return array_map(fn($c) => $c->toArray(), $complaints);
    }

    /**
     * Get most frequent complaints
     */
    public function getFrequentComplaints(int $limit = 20): array
    {
        $complaints = $this->complaintRepo->getByFrequency($limit);
        return array_map(fn($c) => $c->toArray(), $complaints);
    }

    /**
     * Get paginated complaints list
     */
    public function listComplaints(int $page = 1, int $perPage = 20, array $filters = []): array
    {
        $complaints = $this->complaintRepo->paginate($page, $perPage, $filters);
        $total = $this->complaintRepo->count($filters);

        return [
            'data' => array_map(fn($c) => $c->toArray(), $complaints),
            'pagination' => [
                'page' => $page,
                'per_page' => $perPage,
                'total' => $total,
                'last_page' => (int)ceil($total / $perPage),
            ],
        ];
    }

    /**
     * Validate complaint data
     */
    public function validateComplaint(array $data): array
    {
        $errors = [];

        if (empty($data['id'])) {
            $errors['id'] = 'ID is required';
        }

        if (empty($data['name'])) {
            $errors['name'] = 'Name is required';
        } elseif (strlen($data['name']) > 255) {
            $errors['name'] = 'Name must not exceed 255 characters';
        }

        if (empty($data['category'])) {
            $errors['category'] = 'Category is required';
        }

        if (isset($data['min_age']) && isset($data['max_age'])) {
            if ($data['min_age'] < 0 || $data['max_age'] > 120) {
                $errors['age'] = 'Age range must be between 0 and 120';
            }
            if ($data['min_age'] > $data['max_age']) {
                $errors['age'] = 'Min age must not exceed max age';
            }
        }

        if (isset($data['frequency_percent'])) {
            if ($data['frequency_percent'] < 0 || $data['frequency_percent'] > 100) {
                $errors['frequency_percent'] = 'Frequency must be between 0 and 100';
            }
        }

        return $errors;
    }

    /**
     * Create new complaint
     */
    public function createComplaint(array $data, ?string $userId = null): array
    {
        $errors = $this->validateComplaint($data);
        
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        try {
            $complaint = new ChiefComplaint(
                $data['id'],
                $data['name'],
                $data['category'],
                $data['department_id'] ?? null,
                $data['is_dental'] ?? false,
                $data['is_emergency'] ?? false,
                $data['description'] ?? '',
                $data['min_age'] ?? 0,
                $data['max_age'] ?? 120,
                $data['gender_restriction'] ?? 'Both',
                true,
                $data['frequency_percent'] ?? 0.0,
                $data['icd_primary'] ?? null,
                null,
                null,
                $userId
            );

            $this->complaintRepo->create($complaint);

            return [
                'success' => true,
                'message' => 'Complaint created successfully',
                'data' => $complaint->toArray(),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error creating complaint: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Update complaint
     */
    public function updateComplaint(string $complaintId, array $data, ?string $userId = null): array
    {
        $complaint = $this->complaintRepo->findById($complaintId);
        
        if (!$complaint) {
            return ['success' => false, 'message' => 'Complaint not found'];
        }

        try {
            if (isset($data['name'])) {
                $complaint->setName($data['name']);
            }
            if (isset($data['category'])) {
                $complaint->setCategory($data['category']);
            }
            if (isset($data['description'])) {
                $complaint->setDescription($data['description']);
            }
            if (isset($data['is_dental'])) {
                $complaint->setIsDental($data['is_dental']);
            }
            if (isset($data['is_emergency'])) {
                $complaint->setIsEmergency($data['is_emergency']);
            }
            if (isset($data['min_age'])) {
                $complaint->setMinAge($data['min_age']);
            }
            if (isset($data['max_age'])) {
                $complaint->setMaxAge($data['max_age']);
            }
            if (isset($data['frequency_percent'])) {
                $complaint->setFrequencyPercent($data['frequency_percent']);
            }

            $complaint->setUpdatedBy($userId);
            $this->complaintRepo->update($complaint);

            return [
                'success' => true,
                'message' => 'Complaint updated successfully',
                'data' => $complaint->toArray(),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error updating complaint: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Deactivate complaint
     */
    public function deactivateComplaint(string $complaintId): array
    {
        try {
            $this->complaintRepo->deactivate($complaintId);
            
            return [
                'success' => true,
                'message' => 'Complaint deactivated successfully',
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error deactivating complaint: ' . $e->getMessage(),
            ];
        }
    }
}
