<?php

namespace App\DataTransferObjects;

class QuoteViewDto {

    public int $id;
    public string $quote;

    public bool $cached;

    public function __construct(int $id, string $quote, bool $cached = false) {
        $this->id = $id;
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