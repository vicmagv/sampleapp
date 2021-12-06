<?php

namespace App\Tests\Unit\Core\Domain;

use App\Core\Domain\Book;
use App\Core\Domain\BookRepository;

class TestBookRepository implements BookRepository
{
    private array $books;

    public function find(string $isbn): ?Book
    {
        return $this->books[$isbn] ?? null;
    }

    public function save(Book $book): void
    {
        $this->books[$book->isbn()] = $book;
    }

    public function delete(string $isbn)
    {
        unset($this->books[$isbn]);
    }
}