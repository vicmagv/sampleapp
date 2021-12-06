<?php

namespace App\Core\Application\CreateBook;

use App\Core\Domain\Book;
use App\Core\Domain\BookRepository;

class CreateBookHandler
{
    public function __construct(
        private BookRepository $books,
    )
    {
    }

    public function __invoke(CreateBookCommand $command): void
    {
        $book = new Book(
            $command->isbn,
            $command->title
        );

        $this->books->save($book);
    }
}