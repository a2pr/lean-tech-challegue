<?php

namespace App\DataTransferObjects;


class QuoteApiResponseDto {
    
    public string $quote;
    public function __construct(string $quote) {
        $this->quote = $quote;
    }
}