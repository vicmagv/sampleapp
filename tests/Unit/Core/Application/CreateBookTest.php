<?php

namespace App\Tests\Unit\Core\Application;

use App\Core\Application\CreateBook\CreateBookCommand;
use App\Core\Application\CreateBook\CreateBookHandler;
use App\Tests\Unit\Core\Domain\TestBookRepository;
use PHPUnit\Framework\TestCase;

class CreateBookTest extends TestCase
{
    public function testItCreatesABook()
    {
        $books = new TestBookRepository();
        $command = new CreateBookCommand(
            'ISBNTEST',
            'El Quijote'
        );
        $handler = new CreateBookHandler(
            $books
        );
        $handler->__invoke($command);

        $book = $books->find('ISBNTEST');
        self::assertNotNull($book);
        self::assertEquals('El Quijote', $book->title());
    }
}