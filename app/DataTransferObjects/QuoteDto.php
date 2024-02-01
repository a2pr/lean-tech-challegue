<?php

namespace App\DataTransferObjects;

class QuoteDto {
    public string $quote;

    public function __construct(string $quote) {
        $this->quote = $quote;
    }

    public function getQuote(){
        return $this->quote;
    }
}