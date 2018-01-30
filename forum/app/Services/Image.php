<?php

namespace App\Services;

abstract class Image
{
    abstract public function getFileName();


    public function save($image)
    {
        $fileName = $this->getFileName();

        \Log::debug($fileName.' is saved');
    }
}
