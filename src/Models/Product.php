<?php

namespace denesberta\StoreManager\Models;

use denesberta\StoreManager\Interfaces\ProductInterface;

abstract class Product implements ProductInterface
{
    /**
     * @var int
     */
    private static int $ID = 0;

    /**
     * @var int
     */
    private int $id;

    /**
     * @var string
     */
    protected string $productNumber;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var int
     */
    protected int $price;

    /**
     * @var Brand
     */
    protected Brand $brand;

    /**
     * Product constructor.
     * @param string $productNumber
     * @param string $name
     * @param int $price
     * @param Brand $brand
     */
    public function __construct(string $productNumber, string $name, int $price, Brand $brand)
    {
        $this->id = self::$ID++;
        $this->productNumber = $productNumber;
        $this->name = $name;
        $this->price = $price;
        $this->brand = $brand;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getProductNumber(): string
    {
        return $this->productNumber;
    }

    /**
     * @param string $productNumber
     */
    public function setProductNumber(string $productNumber)
    {
        $this->productNumber = $productNumber;
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
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand(Brand $brand)
    {
        $this->brand = $brand;
    }
}



