<?php
declare(strict_types=1);

namespace ContactDentalAid\ChiefComplaints\Repositories;

use ContactDentalAid\ChiefComplaints\Core\DatabaseConnection;
use ContactDentalAid\ChiefComplaints\Models\ChiefComplaint;

/**
 * Chief Complaints Repository
 * Data access layer for chief complaint operations
 */
class ChiefComplaintRepository
{
    private DatabaseConnection $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    /**
     * Find complaint by ID
     */
    public function findById(string $id): ?ChiefComplaint
    {
        $result = $this->db->query(
            'SELECT * FROM chief_complaints WHERE id = ? AND active = 1',
            [$id]
        )->fetch();

        return $result ? $this->mapToModel($result) : null;
    }

    /**
     * Find by name (with fuzzy matching)
     */
    public function findByName(string $name): array
    {
        $query = <<<SQL
            SELECT * FROM chief_complaints 
            WHERE MATCH(name) AGAINST(? IN BOOLEAN MODE) AND active = 1
            ORDER BY MATCH(name) AGAINST(? IN BOOLEAN MODE) DESC
            LIMIT 50
        SQL;

        $results = $this->db->query($query, [$name, $name])->fetchAll();
        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Find by category
     */
    public function findByCategory(string $category): array
    {
        $results = $this->db->query(
            'SELECT * FROM chief_complaints WHERE category = ? AND active = 1 ORDER BY name',
            [$category]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Find by department
     */
    public function findByDepartment(string $departmentId): array
    {
        $results = $this->db->query(
            'SELECT * FROM chief_complaints WHERE department_id = ? AND active = 1 ORDER BY name',
            [$departmentId]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get dental complaints
     */
    public function getDentalComplaints(): array
    {
        $results = $this->db->query(
            'SELECT * FROM chief_complaints WHERE is_dental = 1 AND active = 1 ORDER BY name'
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get emergency complaints
     */
    public function getEmergencyComplaints(): array
    {
        $results = $this->db->query(
            'SELECT * FROM chief_complaints WHERE is_emergency = 1 AND active = 1 ORDER BY frequency_percent DESC'
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Search by age range
     */
    public function findByAgeRange(int $age): array
    {
        $results = $this->db->query(
            'SELECT * FROM chief_complaints WHERE (min_age <= ? AND max_age >= ?) AND active = 1 ORDER BY name',
            [$age, $age]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get paginated results
     */
    public function paginate(int $page = 1, int $perPage = 20, array $filters = []): array
    {
        $offset = ($page - 1) * $perPage;
        $where = ['active = 1'];
        $params = [];

        if (isset($filters['category'])) {
            $where[] = 'category = ?';
            $params[] = $filters['category'];
        }

        if (isset($filters['is_dental'])) {
            $where[] = 'is_dental = ?';
            $params[] = $filters['is_dental'] ? 1 : 0;
        }

        $whereClause = implode(' AND ', $where);
        $query = "SELECT * FROM chief_complaints WHERE {$whereClause} ORDER BY name LIMIT ? OFFSET ?";

        $params[] = $perPage;
        $params[] = $offset;

        $results = $this->db->query($query, $params)->fetchAll();
        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get total count
     */
    public function count(array $filters = []): int
    {
        $where = ['active = 1'];
        $params = [];

        if (isset($filters['category'])) {
            $where[] = 'category = ?';
            $params[] = $filters['category'];
        }

        if (isset($filters['is_dental'])) {
            $where[] = 'is_dental = ?';
            $params[] = $filters['is_dental'] ? 1 : 0;
        }

        $whereClause = implode(' AND ', $where);
        $result = $this->db->query(
            "SELECT COUNT(*) as total FROM chief_complaints WHERE {$whereClause}",
            $params
        )->fetch();

        return (int)$result['total'];
    }

    /**
     * Get by frequency ranking
     */
    public function getByFrequency(int $limit = 20): array
    {
        $results = $this->db->query(
            'SELECT * FROM chief_complaints WHERE active = 1 ORDER BY frequency_percent DESC LIMIT ?',
            [$limit]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Create new complaint
     */
    public function create(ChiefComplaint $complaint): bool
    {
        $query = <<<SQL
            INSERT INTO chief_complaints (
                id, name, category, department_id, is_dental, is_emergency,
                description, min_age, max_age, gender_restriction, active,
                frequency_percent, icd_primary, created_by
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        $this->db->query($query, [
            $complaint->getId(),
            $complaint->getName(),
            $complaint->getCategory(),
            $complaint->getDepartmentId(),
            $complaint->isDental() ? 1 : 0,
            $complaint->isEmergency() ? 1 : 0,
            $complaint->getDescription(),
            $complaint->getMinAge(),
            $complaint->getMaxAge(),
            $complaint->getGenderRestriction(),
            1,
            $complaint->getFrequencyPercent(),
            $complaint->getIcdPrimary(),
            $complaint->getCreatedBy(),
        ]);

        return true;
    }

    /**
     * Update complaint
     */
    public function update(ChiefComplaint $complaint): bool
    {
        $query = <<<SQL
            UPDATE chief_complaints SET
                name = ?, category = ?, department_id = ?, is_dental = ?,
                is_emergency = ?, description = ?, min_age = ?, max_age = ?,
                gender_restriction = ?, frequency_percent = ?, icd_primary = ?,
                updated_by = ?, updated_at = NOW()
            WHERE id = ?
        SQL;

        $this->db->query($query, [
            $complaint->getName(),
            $complaint->getCategory(),
            $complaint->getDepartmentId(),
            $complaint->isDental() ? 1 : 0,
            $complaint->isEmergency() ? 1 : 0,
            $complaint->getDescription(),
            $complaint->getMinAge(),
            $complaint->getMaxAge(),
            $complaint->getGenderRestriction(),
            $complaint->getFrequencyPercent(),
            $complaint->getIcdPrimary(),
            $complaint->getUpdatedBy(),
            $complaint->getId(),
        ]);

        return true;
    }

    /**
     * Soft delete complaint
     */
    public function deactivate(string $id): bool
    {
        $this->db->query(
            'UPDATE chief_complaints SET active = 0, updated_at = NOW() WHERE id = ?',
            [$id]
        );

        return true;
    }

    /**
     * Map database result to model
     */
    private function mapToModel(array $data): ChiefComplaint
    {
        return new ChiefComplaint(
            $data['id'],
            $data['name'],
            $data['category'],
            $data['department_id'],
            (bool)$data['is_dental'],
            (bool)$data['is_emergency'],
            $data['description'] ?? '',
            (int)$data['min_age'],
            (int)$data['max_age'],
            $data['gender_restriction'],
            (bool)$data['active'],
            (float)$data['frequency_percent'],
            $data['icd_primary'] ?? null,
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null
        );
    }
}
