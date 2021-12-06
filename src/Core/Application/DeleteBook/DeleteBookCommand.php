<?php

namespace App\Core\Application\DeleteBook;

class DeleteBookCommand
{
    public function __construct(
        public readonly string $isbn,
    )
    {
    }
}