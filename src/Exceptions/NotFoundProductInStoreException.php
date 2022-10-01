<?php

namespace denesberta\StoreManager\Exception;

class NotFoundProductInStoreException extends \Exception
{
    public function __construct()
    {
        $message = "No such product in stores!";

        parent::__construct($message);
    }
}