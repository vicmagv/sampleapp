<?php

namespace App\Core\Application\UpdateBook;

class UpdateBookCommand
{
    public function __construct(
        public readonly string $isbn,
        public readonly string $title,
    )
    {
    }
}