<?php
require_once 'book.php';

class Library {
    public $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function listBooks() {
        return $this->books;
    }

    public function getBook($index) {
        return $this->books[$index];
    }
}
?>
