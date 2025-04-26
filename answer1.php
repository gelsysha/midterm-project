<!DOCTYPE html>
<html>
<head>
    <title>Tax Amount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        input[type="number"] {
            width: 300px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 5px 15px;
            margin-top: 5px;
        }
        .result {
            margin-top: 15px;
        }
    </style>
</head>
<body>
<form method="POST">
<div class="col-md-1 d-grid">
        <a href="index.php" class="btn btn-dark">⏪Back</a></br>
    </div>
        <input type="number" name="tax_amount" placeholder="Enter Tax Amount" min="1" step="any" required><br>

        <input type="checkbox" name="has_npwp" id="has_npwp">
        <label for="has_npwp"><b>Has NPWP</b></label><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $taxAmount = isset($_POST["tax_amount"]) ? floatval($_POST["tax_amount"]) : 0;
        $hasNPWP = isset($_POST["has_npwp"]);

        // Validate: must be a positive number
        if ($taxAmount <= 0) {
            echo "<p style='color:red;'>Jumlah pajak harus bernilai positif.</p>";
        } else {
            if ($hasNPWP) {
                $finalTax = $taxAmount;
            } else {
                $finalTax = $taxAmount + ($taxAmount * 0.20); // Add 20% tax
            }

            echo "<div class='result'>";
            echo "<p>Tax amount: " . number_format($finalTax, 0) . "</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>