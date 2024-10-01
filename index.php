<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 30px;
            background-color: #f7f7f7;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }
        form {
            text-align: center;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }
        label, select, input {
            margin: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <h1>Order System - Balinado </h1>
    
    <h2 style="text-align:center;">MENU</MENU></h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>Burger</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Fries</td>
            <td>75</td>
        </tr>
        <tr>
            <td>Steak</td>
            <td>150</td>
        </tr>
    </table>

    <form method="post" action="receipt.php">
        <label for="order">Select Order:</label>
        <select name="order" id="order" required>
            <option value="Burger">Burger</option>
            <option value="Fries">Fries</option>
            <option value="Steak">Steak</option>
        </select>
        <br><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" required>
        <br><br>
        <label for="cash">Cash Given:</label>
        <input type="number" name="cash" id="cash" min="0" step="0.01" required>
        <br><br>
        <button type="submit">Submit Order</button>
    </form>
</body>
</html>

