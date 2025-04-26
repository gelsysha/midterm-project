<!DOCTYPE html>
<html>
<head>
    <title>Grocery Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            border-collapse: collapse;
            margin: 50px auto;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 2px solid black;
            padding: 10px 20px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="text-center mt-3">
    <a href="index.php" class="btn btn-dark">⏪ Back</a>
</div>

<?php
$data = [
    ["name" => "Milk", "qty" => 2, "price" => 5000],
    ["name" => "Tofu", "qty" => 4, "price" => 10000],
    ["name" => "Tea", "qty" => 3, "price" => 3000],
    ["name" => "Candy", "qty" => 5, "price" => 1000],
    ["name" => "Cookies", "qty" => 4, "price" => 4500],
];

echo "<table>";
echo "<tr><th>Name</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>";

$grandTotal = 0;

foreach ($data as $item) {
    $subtotal = $item["qty"] * $item["price"];
    $grandTotal += $subtotal;
    echo "<tr>
            <td>{$item['name']}</td>
            <td>{$item['qty']}</td>
            <td>{$item['price']}</td>
            <td>{$subtotal}</td>
          </tr>";
}

echo "<tr>
        <td colspan='3'><strong>Total</strong></td>
        <td><strong>{$grandTotal}</strong></td>
      </tr>";

echo "</table>";
?>

</body>
</html>
