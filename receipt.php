<?php
session_start();

// Initialize variables
$order = "";
$quantity = 0;
$totalAmount = 0;
$cashGiven = 0;
$change = 0;
$showReceipt = false;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $order = htmlspecialchars($_POST['order']);
    $quantity = (int)$_POST['quantity'];
    
    // Set price for the order (example: Burger price is 50)
    $pricePerItem = 50;
    $totalAmount = $pricePerItem * $quantity;

    // Get cash given by the user
    $cashGiven = (float)$_POST['cash'];

    // Check if the cash provided is sufficient
    if ($cashGiven < $totalAmount) {
        // Insufficient cash
        $neededCash = $totalAmount - $cashGiven;
        header("Location: insufficient.php?totalAmount=$totalAmount&cash=$cashGiven");
        exit; // Exit to ensure no further code is executed
    } else {
        // Calculate change
        $change = $cashGiven - $totalAmount;
        $showReceipt = true; // Set flag to show receipt
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f7f7f7;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 40%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #000;
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
            font-size: 18px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .back-button {
            display: block;
            width: 40%;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php if ($showReceipt): ?>
    <h1>RECEIPT</h1>
    <table>
        <tr>
            <th>Order</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Cash Given</th>
            <th>Change</th>
        </tr>
        <tr>
            <td><?php echo $order; ?></td>
            <td><?php echo $quantity; ?></td>
            <td><?php echo $totalAmount; ?></td>
            <td><?php echo $cashGiven; ?></td>
            <td><?php echo $change; ?></td>
        </tr>
    </table>
    <a href="index.php" class="back-button">Back to Menu</a>
<?php endif; ?>

</body>
</html>



