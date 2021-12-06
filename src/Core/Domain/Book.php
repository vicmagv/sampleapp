<?php
namespace App\Core\Domain;

class Book
{
    public function __construct(
        private string $isbn,
        private string $title,
    ){
    }

    public function isbn(): string
    {
        return $this->isbn;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function updateTitle(string $title): void
    {
        $this->title = $title;
    }
}