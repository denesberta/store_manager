<?php

namespace denesberta\StoreManager;

use denesberta\StoreManager\Exception\NotFoundStoreException;
use denesberta\StoreManager\Models\Store;
use denesberta\StoreManager\Models\Product;
use denesberta\StoreManager\Exception\NotFoundProductInStoreException;
use denesberta\StoreManager\Exception\StoreIsFullException;

class StoreManager
{
    /**
     * @var array
     */
    private array $stores;

    public function __construct()
    {
        $this->stores = [];
    }

    /**
     * @param Store $store
     */
    public function addStore(Store $store)
    {
        $this->stores[] = $store;
    }

    /**
     * @return array
     */
    public function getStores(): array
    {
        return $this->stores;
    }

    /**
     * @param Product $product
     * @throws StoreIsFullException
     */
    public function addProduct(Product $product)
    {
        $added = false;

        foreach ($this->stores as $store) {
            if (!$store->isFull()) {
                $store->addProduct($product);

                $added = true;

                break;
            }
        }

        if (!$added) {
            throw new StoreIsFullException();
        }
    }

    /**
     * @param Product $product
     * @param Store $store
     *
     * @throws StoreIsFullException
     * @throws NotFoundStoreException
     */
    public function addProductToStore(Product $product, Store $store)
    {
        if ($store->isFull()) {
            throw new StoreIsFullException();
        }

        if (!in_array($store, $this->stores, true)) {
            throw new NotFoundStoreException();
        }

        if (!$store->isFull() && in_array($store, $this->stores, true)) {
            $store->addProduct($product);
        }
    }

    /**
     * @param Product $product
     * @throws NotFoundProductInStoreException
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->stores as $store) {
            if ($store->hasProduct($product)) {
                $store->removeProduct($product);
                return;
            }
        }
        throw new NotFoundProductInStoreException();
    }

    /**
     * @param Product $product
     * @param Store $store
     *
     * @throws NotFoundProductInStoreException
     * @throws NotFoundStoreException
     */
    public function removeProductFromStore(Product $product, Store $store)
    {
        if (!in_array($store, $this->stores, true)) {
            throw new NotFoundStoreException();
        }

        if (!$store->hasProduct($product)) {
            throw new NotFoundProductInStoreException();
        }

        if ($store->hasProduct($product) && in_array($store, $this->stores, true)) {
            $store->removeProduct($product);
        }
    }

    public function printStoreWithProducts()
    {
        foreach ($this->stores as $store) {
            echo $store;
            echo '<ul>Products: ';
            foreach ($store->getProducts() as $product) {
                echo '<li>' . $product->product . " (" . $product->count . " db)" . '</li>';
            }
            echo '</ul>';
        }
    }


}