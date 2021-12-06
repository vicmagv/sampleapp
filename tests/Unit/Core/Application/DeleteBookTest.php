<?php

namespace App\Tests\Unit\Core\Application;

use App\Core\Application\DeleteBook\DeleteBookCommand;
use App\Core\Application\DeleteBook\DeleteBookHandler;
use App\Tests\Mother\Core\BookMother;
use App\Tests\Unit\Core\Domain\TestBookRepository;
use PHPUnit\Framework\TestCase;

class DeleteBookTest extends TestCase
{
    public function testItDeletesABook(): void
    {
        $books = new TestBookRepository();
        $book = BookMother::book();
        $books->save($book);

        $handler = new DeleteBookHandler(
            $books
        );
        $command = new DeleteBookCommand(
            $book->isbn()
        );
        $handler->__invoke($command);

        $book = $books->find($book->isbn());
        self::assertNull($book);
    }
}