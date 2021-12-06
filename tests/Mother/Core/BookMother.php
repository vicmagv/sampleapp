<?php

namespace App\Tests\Mother\Core;

use App\Core\Domain\Book;

class BookMother
{
    public static function book(): Book
    {
        return new Book(
            'ISBNMOTHER',
            'This a mother title!'
        );
    }
}