<?php

namespace App\Facades;

use App\DataTransferObjects\ImageDto;
use App\Services\RandomImageService;

class ImageFacade {

    public RandomImageService $imageService;
    
    public function __construct() {
        $this->imageService = new RandomImageService;
    }


    public function getRandomImage(): ImageDto
    {
        return $this->imageService->getRandomImage();
    }

    
}