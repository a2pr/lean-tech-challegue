<?php

namespace App\DataTransferObjects;

class UserViewDto {

    public int $user_id;
    public string $username;
    public string $name;
    public array $quotes = [];

    public function __construct(int $user_id, string $username, string $name) {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->name = $name;
    }
}