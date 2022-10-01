<?php

namespace denesberta\StoreManager\Models;

class Car extends Product
{
    const DIESEL = 'diesel';
    const GASOLINE = 'gasoline';
    const ELECTRIC = 'electric';

    /**
     * @var string
     */
    private string $fuelType;

    /**
     * Car constructor.
     * @param string $name
     * @param string $itemNumber
     * @param int $price
     * @param Brand $brand
     * @param string $fuelType
     */
    public function __construct(string $name, string $itemNumber, int $price, Brand $brand, string $fuelType)
    {
        $this->fuelType = $fuelType;
        parent::__construct($itemNumber, $name, $price, $brand);
    }

    /**
     * @return string
     */
    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    /**
     * @param string $fuelType
     */
    public function setFuelType(string $fuelType): void
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return '<strong>Car:</strong>' . $this->name .
            '[' .
                $this->productNumber . ', ' .
                $this->price . ' Ft, ' .
                $this->brand . ', ' .
                'fuel: ' . $this->fuelType .
            ']';
    }

}