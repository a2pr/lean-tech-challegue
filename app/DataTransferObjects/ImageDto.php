<?php

namespace App\DataTransferObjects;

class ImageDto {
    public string $link;

    public function __construct(string $link) {
        $this->link = $link;
    }

    public function getLink(){
        return $this->link;
    }
}