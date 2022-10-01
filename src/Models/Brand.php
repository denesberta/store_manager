<?php

namespace denesberta\StoreManager\Models;

class Brand
{
    public const QUALITY_CHEAP = 1;
    public const QUALITY_NORMAL = 2;
    public const QUALITY_EXPENSIVE = 3;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $qualityCategory;

    /**
     * Brand constructor.
     * @param string $name
     * @param int $qualityCategory
     */
    public function __construct(string $name, int $qualityCategory)
    {
        $this->name = $name;
        $this->qualityCategory = $qualityCategory;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getQualityCategory(): int
    {
        return $this->qualityCategory;
    }

    /**
     * @return int
     */
    public function getQualityCategoryWord(): string
    {
        return match ($this->qualityCategory) {
            self::QUALITY_CHEAP => 'cheap',
            self::QUALITY_NORMAL => 'normal',
            self::QUALITY_EXPENSIVE => 'expensive',
            default => 'unknown',
        };
    }

    /**
     * @param int $qualityCategory
     */
    public function setQualityCategory(int $qualityCategory)
    {
        $this->qualityCategory = $qualityCategory;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'Brand:' . $this->name .
            '(' .
                'quality: ' . $this->getQualityCategoryWord() .
            ')';
    }
}