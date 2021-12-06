<?php

namespace App\Core\Application\DeleteBook;

use App\Core\Domain\BookRepository;

class DeleteBookHandler
{
    public function __construct(
        private BookRepository $books,
    )
    {
    }

    public function __invoke(DeleteBookCommand $command): void
    {
        $this->books->delete($command->isbn);
    }
}