<?php

/**
 * Class Model
 */
class Model
{

    public function __construct($loadDB = false)
    {
        if ($loadDB) {
            $this->Db = new Database();
        }
    }
} 