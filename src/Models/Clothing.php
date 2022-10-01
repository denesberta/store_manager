<?php

namespace denesberta\StoreManager\Models;

class Clothing extends Product
{
    /**
     * @var string
     */
    private string $size;

    /**
     * Clothing constructor.
     * @param string $name
     * @param string $itemNumber
     * @param int $price
     * @param Brand $brand
     * @param string $size
     */
    public function __construct(string $name, string $itemNumber, int $price, Brand $brand, string $size)
    {
        $this->size = $size;
        parent::__construct($itemNumber, $name, $price, $brand);
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return '<strong>Clothing:</strong>' . $this->name .
            '[' .
                $this->productNumber . ', ' .
                $this->price . ' Ft, ' .
                $this->brand . ', ' .
                'size: ' . $this->size .
            ']';
    }
}