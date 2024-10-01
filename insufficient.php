<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SORRY, BALANCE NOT ENOUGH.</title>
    <style>
        /* General Page Styling */
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

        /* Message Styling */
        .message {
            text-align: center;
            font-size: 18px;
            margin: 20px;
            color: red; /* Change color for emphasis */
        }

        /* Back Button Styling */
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
    <h1>SORRY, BALANCE NOT ENOUGH</h1>
    <div class="message">
        <?php
        // Get the total amount and cash given from the URL
        $totalAmount = isset($_GET['totalAmount']) ? (int)$_GET['totalAmount'] : 0;
        $cashGiven = isset($_GET['cash']) ? (float)$_GET['cash'] : 0;

        // Calculate the needed cash
        $neededCash = $totalAmount - $cashGiven;

        // Display the message
        if ($neededCash > 0) {
            echo "Insufficient cash! You need an additional " . $neededCash . " to complete your order.";
        } else {
            echo "Unexpected error: Your cash amount should not exceed the total amount.";
        }
        ?>
    </div>
    <a href="index.php" class="back-button">Back to Menu</a>
</body>
</html>


