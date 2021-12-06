<?php

namespace App\Core\Application\CreateBook;

class CreateBookCommand
{
    public function __construct(
        public readonly string $isbn,
        public readonly string $title,
    )
    {
    }
}