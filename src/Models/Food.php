<?php

namespace denesberta\StoreManager\Models;

class Food extends Product
{
    /**
     * @var string
     */
    private string $expirationDate;

    /**
     * Car constructor.
     * @param string $name
     * @param string $itemNumber
     * @param int $price
     * @param Brand $brand
     * @param string $expirationDate
     */
    public function __construct(string $name, string $itemNumber, int $price, Brand $brand, string $expirationDate)
    {
        $this->expirationDate = $expirationDate;
        parent::__construct($itemNumber, $name, $price, $brand);
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     */
    public function setExpirationDate(string $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return '<strong>Food:</strong>' . $this->name .
            '[' .
            $this->productNumber . ', ' .
            $this->price . ' Ft, ' .
            $this->brand . ', ' .
            'expiration: ' . $this->expirationDate .
            ']';
    }

}