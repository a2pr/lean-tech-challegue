<?php

namespace App\DataTransferObjects;

class UserFavoriteQuoteViewDto {

    public int $id;
    public int $user_id;
    public string $quote;

    public function __construct(int $id, int $user_id, string $quote) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->quote = $quote;
    }

    public function getQuote(){
        return $this->quote;
    }
}