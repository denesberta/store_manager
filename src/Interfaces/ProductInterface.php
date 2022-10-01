<?php

namespace denesberta\StoreManager\Interfaces;

use denesberta\StoreManager\Models\Brand;

interface ProductInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getProductNumber(): string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @return Brand
     */
    public function getBrand(): Brand;

    /**
     * @return string
     */
    public function __toString(): string;
}
