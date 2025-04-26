<!DOCTYPE html>
<html>
<head>
    <title>3x3 Grid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 60px);
            grid-template-rows: repeat(3, 60px);
            gap: 2px;
            width: max-content;
            margin: 50px auto;
        }

        .cell {
            border: 2px solid black;
            font-size: 32px;
            text-align: center;
            vertical-align: middle;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
<div class="text-center mt-3">
    <a href="index.php" class="btn btn-dark">⏪ Back</a>
</div>
<div class="grid">
    <?php
        foreach (range(1, 9) as $num) {
            echo "<div class='cell'>$num</div>";
        }
    ?>
</div>

</body>
</html>
