<?php

namespace App\Tests\Unit\Core\Application;

use App\Core\Application\UpdateBook\UpdateBookCommand;
use App\Core\Application\UpdateBook\UpdateBookHandler;
use App\Tests\Mother\Core\BookMother;
use App\Tests\Unit\Core\Domain\TestBookRepository;
use PHPUnit\Framework\TestCase;

class UpdateBookTest extends TestCase
{
    public function testItUpdatesABook(): void
    {
        $books = new TestBookRepository();
        $book = BookMother::book();
        $books->save($book);

        $handler = new UpdateBookHandler(
            $books
        );
        $command = new UpdateBookCommand(
            $book->isbn(),
            'Don Quijote de la mancha'
        );
        $handler->__invoke($command);

        $book = $books->find( $book->isbn());
        self::assertNotNull($book);
        self::assertEquals('Don Quijote de la mancha', $book->title());
    }
}