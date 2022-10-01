<?php

namespace denesberta\StoreManager\Exception;

class StoreIsFullException extends \Exception
{
    public function __construct()
    {
        $message = "Store is full!";

        parent::__construct($message);
    }


}