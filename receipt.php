<?php
session_start();

// Set the timezone to Philippines
date_default_timezone_set('Asia/Manila');

// Initialize variables
$order = "";
$quantity = 0;
$totalAmount = 0;
$cashGiven = 0;
$change = 0;
$showReceipt = false;

// Price mapping for each item
$itemPrices = [
    "Burger" => 50,
    "Fries" => 75,
    "Steak" => 150
];

// Get current date and time
$currentDate = date('Y-m-d');
$currentTime = date('h:i A'); // Format: HH:MM AM/PM

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $order = htmlspecialchars($_POST['order']);
    $quantity = (int)$_POST['quantity'];
    
    // Calculate total amount
    $totalAmount = $itemPrices[$order] * $quantity;

    // Get cash given by the user
    $cashGiven = (float)$_POST['cash'];

    // Check if the cash provided is sufficient
    if ($cashGiven < $totalAmount) {
        // Insufficient cash
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
    <title>Receipt</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .receipt {
            width: 300px;
            padding: 10px;
            border: 2px solid #000;
            background-color: #fff;
            text-align: center;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 20px;
            margin: 0 0 10px;
        }
        .datetime {
            font-size: 12px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            padding: 5px;
            border: 1px solid #000;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            margin-top: 10px;
        }
        .change {
            font-weight: bold;
            margin-top: 5px;
        }
        .back-button {
            display: block;
            width: 94%;
            margin-top: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php if ($showReceipt): ?>
    <div class="receipt">
        <h1>Receipt</h1>
        <div class="datetime">
            <strong>Date:</strong> <?php echo $currentDate; ?><br>
            <strong>Time:</strong> <?php echo $currentTime; ?>
        </div>
        <table>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
            <tr>
                <td><?php echo $order; ?></td>
                <td><?php echo $quantity; ?></td>
                <td>₱<?php echo number_format($totalAmount, 2); ?></td>
            </tr>
        </table>
        <div class="total">Total Amount: ₱<?php echo number_format($totalAmount, 2); ?></div>
        <div>Cash Given: ₱<?php echo number_format($cashGiven, 2); ?></div>
        <div class="change">Change: ₱<?php echo number_format($change, 2); ?></div>

        <a href="index.php" class="back-button">Back to Menu</a>
    </div>
<?php endif; ?>

</body>
</html>
