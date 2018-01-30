<?php

namespace App\Services;

abstract class ImageList
{
   private $images; 

   public function getImages()
   {
       return $images;
   }

   public function addImage($imageClass)
   {
        $this->images[] = $imageClass;
   }
   
}
