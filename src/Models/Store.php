<?php

namespace denesberta\StoreManager\Models;

class Store
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
    private string $name;
    /**
     * @var string
     */
    private string $address;
    /**
     * @var int
     */
    private int $capacity;
    /**
     * @var array
     */
    private array $products;

    /**
     * Store constructor.
     * @param string $name
     * @param string $address
     * @param int $capacity
     */
    public function __construct(string $name, string $address, int $capacity)
    {
        $this->id = self::$ID++;
        $this->name = $name;
        $this->address = $address;
        $this->capacity = $capacity;
        $this->products = [];
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
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity(int $capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $found = false;

        foreach ($this->products as $prod) {
            if ($prod->product->getId() === $product->getId()) {
                $prod->count++;

                $found = true;
                break;
            }
        }


        if (!$found) {
            $this->products[] = (object)[
                'product' => $product,
                'count' => 1
            ];
        }

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function hasProduct(Product $product): bool
    {
        foreach ($this->products as $prod) {
            if ($prod->product->getId() === $product->getId()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function removeProduct(Product $product): bool
    {
        foreach ($this->products as $i => $prod) {
            if ($prod->product->getId() === $product->getId()) {
                if ($prod->count === 1) {
                    unset($this->products[$i]);
                } else {
                    $prod->count--;
                }
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->capacity === $this->getProductsCount();
    }

    /**
     * @return int
     */
    public function getProductsCount(): int
    {
        $count = 0;

        foreach ($this->products as $product) {
            $count += $product->count;
        }
        return $count;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '<br/><strong>Store</strong>: ' . $this->name .
            ' [' .
            $this->address .
            ', ' .
            $this->getProductsCount() .
            '/' .
            $this->capacity .
            ']';
    }


}