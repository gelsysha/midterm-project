<?php 
session_start();
require_once 'book.php';
require_once 'library.php';

if (isset($_SESSION['library'])) {
    $library = unserialize($_SESSION['library']);  
} else {
    $library = new Library();  
    $library->addBook(new Book("The Great Gatsby", "F. Scott Fitzgerald"));
    $library->addBook(new Book("Laskar Pelangi", "Andrea Hirata"));
    $library->addBook(new Book("The Catcher in the Rye", "J.D. Salinger"));
    $library->addBook(new Book("Pride and Prejudice", " Jane Austen"));
    $library->addBook(new Book("To Kill a Mockingbird", " Harper Lee"));
    $_SESSION['library'] = serialize($library);  
}


if (isset($_GET['action']) && isset($_GET['index'])) {
    $action = $_GET['action'];
    $index = $_GET['index'];

    if ($action === 'borrow') {
        $library->books[$index]->borrow(); 
    } elseif ($action === 'return') {
        $library->books[$index]->returnBook();  
    }

    $_SESSION['library'] = serialize($library);  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">📚 Library System</h2>
    <div class="col-md-1 d-grid">
        <a href="index.php" class="btn btn-dark">⏪Back</a></br>
    </div>

    <table class="table table-bordered bg-white text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>📖 Title</th>
                <th>✍️ Author</th>
                <th>📌 Status</th>
                <th>⚙️ Actions</th>
                <th>💬 Message</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($library->listBooks() as $index => $book): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $book->getTitle() ?></td>
                    <td><?= $book->getAuthor() ?></td>
                    <td><?= $book->getStatus() == "Available" ? "<span class='badge bg-success'>Available</span>" : "<span class='badge bg-warning text-dark'>Borrowed</span>"?></td>
                    <td>
                     <?php if ($book->getIsBorrowed()): ?>
                      <a href="?action=return&index=<?= $index ?>" class="btn btn-success btn-sm">Return</a>
                      <?php else: ?>
                        <a href="?action=borrow&index=<?= $index ?>" class="btn btn-primary btn-sm">Borrow</a>
                            <?php endif; ?>
                    </td>
                    <td>
                        <?= $book->message ?>  <!-- Menampilkan pesan dengan benar -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
