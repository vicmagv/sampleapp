<?php

namespace App\Tests\Unit\Core\Application;

use App\Core\Application\UpdateBook\UpdateBookCommand;
use App\Core\Application\UpdateBook\UpdateBookHandler;
use App\Core\Domain\Book;
use App\Tests\Unit\Core\Domain\TestBookRepository;
use PHPUnit\Framework\TestCase;

class UpdateBookTest extends TestCase
{
    public function testItUpdatesABook()
    {
        $books = new TestBookRepository();
        $book = new Book(
            'ISBNTEST',
            'El Quijote'
        );
        $books->save($book);

        $handler = new UpdateBookHandler(
            $books
        );
        $command = new UpdateBookCommand(
            'ISBNTEST',
            'Don Quijote de la mancha'
        );
        $handler->__invoke($command);

        $book = $books->find('ISBNTEST');
        self::assertEquals('Don Quijote de la mancha', $book->title());
    }
}