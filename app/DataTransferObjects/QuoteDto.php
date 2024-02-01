<?php

namespace App\DataTransferObjects;

class QuoteDto {
    public string $quote;

    public bool $cached;

    public function __construct(string $quote, bool $cached = false) {
        $this->quote = $quote;
        $this->cached =$cached;
    }

    public function getQuote(){
        return $this->quote;
    }

    public function isCached(){
        return $this->cached;
    }
}