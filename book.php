<?php
class book {
    private $title;
    private $author;
    private $isBorrowed = false;
    public $message = "";

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function borrow() {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            $this->message = "{$this->title} has been borrowed.";
        } else {
            $this->message = "{$this->title} is already borrowed.";
        }
    }

    public function returnBook() {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            $this->message = "{$this->title} has been returned.";
        } else {
            $this->message = "{$this->title} was not borrowed.";
        }
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getStatus() {
        return $this->isBorrowed ? "Borrowed" : "Available";
    }

    public function getIsBorrowed() {
        return $this->isBorrowed;
    }

   
}
