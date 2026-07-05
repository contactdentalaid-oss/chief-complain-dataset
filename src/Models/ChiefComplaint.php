<?php
declare(strict_types=1);

namespace ContactDentalAid\ChiefComplaints\Models;

/**
 * Chief Complaint Model
 * Value object representing a chief complaint
 */
class ChiefComplaint
{
    private string $id;
    private string $name;
    private string $category;
    private ?string $departmentId;
    private bool $isDental;
    private bool $isEmergency;
    private string $description;
    private int $minAge;
    private int $maxAge;
    private string $genderRestriction;
    private bool $active;
    private float $frequencyPercent;
    private ?string $icdPrimary;
    private ?string $createdAt;
    private ?string $updatedAt;
    private ?string $createdBy;
    private ?string $updatedBy;

    public function __construct(
        string $id,
        string $name,
        string $category,
        ?string $departmentId = null,
        bool $isDental = false,
        bool $isEmergency = false,
        string $description = '',
        int $minAge = 0,
        int $maxAge = 120,
        string $genderRestriction = 'Both',
        bool $active = true,
        float $frequencyPercent = 0.0,
        ?string $icdPrimary = null,
        ?string $createdAt = null,
        ?string $updatedAt = null,
        ?string $createdBy = null,
        ?string $updatedBy = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->departmentId = $departmentId;
        $this->isDental = $isDental;
        $this->isEmergency = $isEmergency;
        $this->description = $description;
        $this->minAge = $minAge;
        $this->maxAge = $maxAge;
        $this->genderRestriction = $genderRestriction;
        $this->active = $active;
        $this->frequencyPercent = $frequencyPercent;
        $this->icdPrimary = $icdPrimary;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->createdBy = $createdBy;
        $this->updatedBy = $updatedBy;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getDepartmentId(): ?string
    {
        return $this->departmentId;
    }

    public function setDepartmentId(?string $departmentId): void
    {
        $this->departmentId = $departmentId;
    }

    public function isDental(): bool
    {
        return $this->isDental;
    }

    public function setIsDental(bool $isDental): void
    {
        $this->isDental = $isDental;
    }

    public function isEmergency(): bool
    {
        return $this->isEmergency;
    }

    public function setIsEmergency(bool $isEmergency): void
    {
        $this->isEmergency = $isEmergency;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getMinAge(): int
    {
        return $this->minAge;
    }

    public function setMinAge(int $minAge): void
    {
        $this->minAge = $minAge;
    }

    public function getMaxAge(): int
    {
        return $this->maxAge;
    }

    public function setMaxAge(int $maxAge): void
    {
        $this->maxAge = $maxAge;
    }

    public function getGenderRestriction(): string
    {
        return $this->genderRestriction;
    }

    public function setGenderRestriction(string $genderRestriction): void
    {
        $this->genderRestriction = $genderRestriction;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getFrequencyPercent(): float
    {
        return $this->frequencyPercent;
    }

    public function setFrequencyPercent(float $frequencyPercent): void
    {
        $this->frequencyPercent = $frequencyPercent;
    }

    public function getIcdPrimary(): ?string
    {
        return $this->icdPrimary;
    }

    public function setIcdPrimary(?string $icdPrimary): void
    {
        $this->icdPrimary = $icdPrimary;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): void
    {
        $this->updatedBy = $updatedBy;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'department_id' => $this->departmentId,
            'is_dental' => $this->isDental,
            'is_emergency' => $this->isEmergency,
            'description' => $this->description,
            'min_age' => $this->minAge,
            'max_age' => $this->maxAge,
            'gender_restriction' => $this->genderRestriction,
            'active' => $this->active,
            'frequency_percent' => $this->frequencyPercent,
            'icd_primary' => $this->icdPrimary,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'created_by' => $this->createdBy,
            'updated_by' => $this->updatedBy,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES);
    }
}
