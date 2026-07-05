<?php
declare(strict_types=1);

namespace ContactDentalAid\ChiefComplaints\Models;

/**
 * Question Template Model
 * Represents a question associated with a chief complaint
 */
class QuestionTemplate
{
    private string $id;
    private string $complaintId;
    private string $questionText;
    private string $questionType;
    private int $sequenceOrder;
    private bool $isRequired;
    private bool $isConditional;
    private ?array $conditionalLogic;
    private ?string $helpText;
    private ?string $placeholder;
    private ?int $minValue;
    private ?int $maxValue;
    private ?int $stepValue;
    private ?string $unit;
    private bool $active;
    private ?string $createdAt;
    private ?string $updatedAt;

    public function __construct(
        string $id,
        string $complaintId,
        string $questionText,
        string $questionType,
        int $sequenceOrder,
        bool $isRequired = true,
        bool $isConditional = false,
        ?array $conditionalLogic = null,
        ?string $helpText = null,
        ?string $placeholder = null,
        ?int $minValue = null,
        ?int $maxValue = null,
        ?int $stepValue = null,
        ?string $unit = null,
        bool $active = true,
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id;
        $this->complaintId = $complaintId;
        $this->questionText = $questionText;
        $this->questionType = $questionType;
        $this->sequenceOrder = $sequenceOrder;
        $this->isRequired = $isRequired;
        $this->isConditional = $isConditional;
        $this->conditionalLogic = $conditionalLogic;
        $this->helpText = $helpText;
        $this->placeholder = $placeholder;
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->stepValue = $stepValue;
        $this->unit = $unit;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getComplaintId(): string
    {
        return $this->complaintId;
    }

    public function getQuestionText(): string
    {
        return $this->questionText;
    }

    public function setQuestionText(string $questionText): void
    {
        $this->questionText = $questionText;
    }

    public function getQuestionType(): string
    {
        return $this->questionType;
    }

    public function getSequenceOrder(): int
    {
        return $this->sequenceOrder;
    }

    public function setSequenceOrder(int $sequenceOrder): void
    {
        $this->sequenceOrder = $sequenceOrder;
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }

    public function setIsRequired(bool $isRequired): void
    {
        $this->isRequired = $isRequired;
    }

    public function isConditional(): bool
    {
        return $this->isConditional;
    }

    public function setIsConditional(bool $isConditional): void
    {
        $this->isConditional = $isConditional;
    }

    public function getConditionalLogic(): ?array
    {
        return $this->conditionalLogic;
    }

    public function setConditionalLogic(?array $conditionalLogic): void
    {
        $this->conditionalLogic = $conditionalLogic;
    }

    public function getHelpText(): ?string
    {
        return $this->helpText;
    }

    public function setHelpText(?string $helpText): void
    {
        $this->helpText = $helpText;
    }

    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    public function setPlaceholder(?string $placeholder): void
    {
        $this->placeholder = $placeholder;
    }

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function setMinValue(?int $minValue): void
    {
        $this->minValue = $minValue;
    }

    public function getMaxValue(): ?int
    {
        return $this->maxValue;
    }

    public function setMaxValue(?int $maxValue): void
    {
        $this->maxValue = $maxValue;
    }

    public function getStepValue(): ?int
    {
        return $this->stepValue;
    }

    public function setStepValue(?int $stepValue): void
    {
        $this->stepValue = $stepValue;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'complaint_id' => $this->complaintId,
            'question_text' => $this->questionText,
            'question_type' => $this->questionType,
            'sequence_order' => $this->sequenceOrder,
            'is_required' => $this->isRequired,
            'is_conditional' => $this->isConditional,
            'conditional_logic' => $this->conditionalLogic,
            'help_text' => $this->helpText,
            'placeholder' => $this->placeholder,
            'min_value' => $this->minValue,
            'max_value' => $this->maxValue,
            'step_value' => $this->stepValue,
            'unit' => $this->unit,
            'active' => $this->active,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
    }
}
