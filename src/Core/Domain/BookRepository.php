<?php

namespace App\Core\Domain;

interface BookRepository
{
    public function find(string $isbn): ?Book;
    public function save(Book $book): void;
    public function delete(string $isbn);
}