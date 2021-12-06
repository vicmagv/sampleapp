<?php

namespace App\Tests\Unit\Core\Application;

use App\Core\Application\DeleteBook\DeleteBookCommand;
use App\Core\Application\DeleteBook\DeleteBookHandler;
use App\Core\Domain\Book;
use App\Tests\Unit\Core\Domain\TestBookRepository;
use PHPUnit\Framework\TestCase;

class DeleteBookTest extends TestCase
{
    public function testItDeletesABook()
    {
        $books = new TestBookRepository();
        $book = new Book(
            'ISBNTEST',
            'El Quijote'
        );
        $books->save($book);

        $handler = new DeleteBookHandler(
            $books
        );
        $command = new DeleteBookCommand(
            'ISBNTEST'
        );
        $handler->__invoke($command);

        $book = $books->find('ISBNTEST');
        self::assertNull($book);
    }
}