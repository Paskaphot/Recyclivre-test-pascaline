<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Book;

final class BookRepository
{
    public const BOOK_DATA = [
        ['image_name' => 'book-1.jpg', 'title' => 'Livre 1', 'author' => 'Auteur 1', 'price' => 1000, 'warehoused_at' => '-1 day'],
        ['image_name' => 'book-2.jpg', 'title' => 'Livre 2', 'author' => 'Auteur 2', 'price' => 1050, 'warehoused_at' => '-2 days'],
        ['image_name' => 'book-3.jpg', 'title' => 'Livre 3', 'author' => 'Auteur 2', 'price' => 900, 'warehoused_at' => '-3 days'],
        ['image_name' => 'book-4.jpg', 'title' => 'Livre 4', 'author' => 'Auteur 3', 'price' => 2000, 'warehoused_at' => '-4 days'],
        ['image_name' => 'book-5.jpg', 'title' => 'Livre 5', 'author' => 'Auteur 3', 'price' => 999, 'warehoused_at' => '-5 days'],
        ['image_name' => 'book-6.jpg', 'title' => 'Livre 6', 'author' => 'Auteur 3', 'price' => 679, 'warehoused_at' => '-6 days'],
        ['image_name' => 'book-7.jpg', 'title' => 'Livre 7', 'author' => 'Auteur 4', 'price' => 2089, 'warehoused_at' => '-7 days'],
        ['image_name' => 'book-8.jpg', 'title' => 'Livre 8', 'author' => 'Auteur 5', 'price' => 5000, 'warehoused_at' => '-8 days'],
    ];

    private array $books;

    public function __construct()
    {
        // init values
        $this->books = [];

        foreach (self::BOOK_DATA as $bookRow) {
            $this->books[] = (new Book())
                ->setImageName($bookRow['image_name'])
                ->setTitle($bookRow['title'])
                ->setAuthor($bookRow['author'])
                ->setPrice($bookRow['price'])
                ->setWarehousedAt((new \DateTime())->modify($bookRow['warehoused_at']));
        }

        usort($this->books, fn (Book $book): int => $book->getWarehousedAt() > $book->getWarehousedAt() ? 1 : -1);

    }

    /**
     * @return array<Book>
     */
    public function findAll(): array
    {
        return $this->books;
    }

    /**
     * @return array<Book>
     */
    public function findLastWarehoused(): array
    {
        return array_slice($this->books, 0, 6);
    }

    /**
     * @return array<Book>
     */
    public function search(): array
    {
        $books = $this->books;

        shuffle($books);

        return array_slice($books, 0, 3);
    }
}
