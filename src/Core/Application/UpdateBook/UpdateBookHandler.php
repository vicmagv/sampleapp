<?php

namespace App\Core\Application\UpdateBook;

use App\Core\Domain\BookRepository;

class UpdateBookHandler
{
    public function __construct(
        private BookRepository $books,
    )
    {
    }

    public function __invoke(UpdateBookCommand $command): void
    {
        $book = $this->books->find($command->isbn);

        $book->updateTitle($command->title);

        $this->books->save($book);
    }
}