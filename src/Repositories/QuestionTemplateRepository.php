<?php
declare(strict_types=1);

namespace ContactDentalAid\ChiefComplaints\Repositories;

use ContactDentalAid\ChiefComplaints\Core\DatabaseConnection;
use ContactDentalAid\ChiefComplaints\Models\QuestionTemplate;

/**
 * Question Template Repository
 * Data access layer for question template operations
 */
class QuestionTemplateRepository
{
    private DatabaseConnection $db;

    public function __construct(DatabaseConnection $db)
    {
        $this->db = $db;
    }

    /**
     * Find question by ID
     */
    public function findById(string $id): ?QuestionTemplate
    {
        $result = $this->db->query(
            'SELECT * FROM question_templates WHERE id = ? AND active = 1',
            [$id]
        )->fetch();

        return $result ? $this->mapToModel($result) : null;
    }

    /**
     * Get all questions for a complaint
     */
    public function findByComplaintId(string $complaintId): array
    {
        $results = $this->db->query(
            'SELECT * FROM question_templates WHERE complaint_id = ? AND active = 1 ORDER BY sequence_order',
            [$complaintId]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get required questions for a complaint
     */
    public function getRequiredQuestions(string $complaintId): array
    {
        $results = $this->db->query(
            'SELECT * FROM question_templates WHERE complaint_id = ? AND is_required = 1 AND active = 1 ORDER BY sequence_order',
            [$complaintId]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get conditional questions for a complaint
     */
    public function getConditionalQuestions(string $complaintId): array
    {
        $results = $this->db->query(
            'SELECT * FROM question_templates WHERE complaint_id = ? AND is_conditional = 1 AND active = 1 ORDER BY sequence_order',
            [$complaintId]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Get questions by type
     */
    public function findByType(string $complaintId, string $questionType): array
    {
        $results = $this->db->query(
            'SELECT * FROM question_templates WHERE complaint_id = ? AND question_type = ? AND active = 1 ORDER BY sequence_order',
            [$complaintId, $questionType]
        )->fetchAll();

        return array_map([$this, 'mapToModel'], $results);
    }

    /**
     * Create new question template
     */
    public function create(QuestionTemplate $question): bool
    {
        $query = <<<SQL
            INSERT INTO question_templates (
                id, complaint_id, question_text, question_type, sequence_order,
                is_required, is_conditional, conditional_logic, help_text,
                placeholder, min_value, max_value, step_value, unit, active
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        $this->db->query($query, [
            $question->getId(),
            $question->getComplaintId(),
            $question->getQuestionText(),
            $question->getQuestionType(),
            $question->getSequenceOrder(),
            $question->isRequired() ? 1 : 0,
            $question->isConditional() ? 1 : 0,
            $question->getConditionalLogic() ? json_encode($question->getConditionalLogic()) : null,
            $question->getHelpText(),
            $question->getPlaceholder(),
            $question->getMinValue(),
            $question->getMaxValue(),
            $question->getStepValue(),
            $question->getUnit(),
            1,
        ]);

        return true;
    }

    /**
     * Update question template
     */
    public function update(QuestionTemplate $question): bool
    {
        $query = <<<SQL
            UPDATE question_templates SET
                question_text = ?, question_type = ?, sequence_order = ?,
                is_required = ?, is_conditional = ?, conditional_logic = ?,
                help_text = ?, placeholder = ?, min_value = ?, max_value = ?,
                step_value = ?, unit = ?, updated_at = NOW()
            WHERE id = ?
        SQL;

        $this->db->query($query, [
            $question->getQuestionText(),
            $question->getQuestionType(),
            $question->getSequenceOrder(),
            $question->isRequired() ? 1 : 0,
            $question->isConditional() ? 1 : 0,
            $question->getConditionalLogic() ? json_encode($question->getConditionalLogic()) : null,
            $question->getHelpText(),
            $question->getPlaceholder(),
            $question->getMinValue(),
            $question->getMaxValue(),
            $question->getStepValue(),
            $question->getUnit(),
            $question->getId(),
        ]);

        return true;
    }

    /**
     * Deactivate question template
     */
    public function deactivate(string $id): bool
    {
        $this->db->query(
            'UPDATE question_templates SET active = 0, updated_at = NOW() WHERE id = ?',
            [$id]
        );

        return true;
    }

    /**
     * Map database result to model
     */
    private function mapToModel(array $data): QuestionTemplate
    {
        $conditionalLogic = null;
        if (!empty($data['conditional_logic'])) {
            $conditionalLogic = json_decode($data['conditional_logic'], true);
        }

        return new QuestionTemplate(
            $data['id'],
            $data['complaint_id'],
            $data['question_text'],
            $data['question_type'],
            (int)$data['sequence_order'],
            (bool)$data['is_required'],
            (bool)$data['is_conditional'],
            $conditionalLogic,
            $data['help_text'] ?? null,
            $data['placeholder'] ?? null,
            $data['min_value'] ? (int)$data['min_value'] : null,
            $data['max_value'] ? (int)$data['max_value'] : null,
            $data['step_value'] ? (int)$data['step_value'] : null,
            $data['unit'] ?? null,
            (bool)$data['active'],
            $data['created_at'] ?? null,
            $data['updated_at'] ?? null
        );
    }
}
