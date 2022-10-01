<?php

namespace denesberta\StoreManager\Exception;

class NotFoundStoreException extends \Exception
{
    public function __construct()
    {
        $message = "No such store added to the service!";

        parent::__construct($message);
    }
}