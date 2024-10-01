<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU Order Form</title>
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

        /* Table Styling */
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

        /* Form Styling */
        form {
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
            background-color: #fff;
        }
        label {
            display: block;
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #000;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box; /* Ensures padding is inside the input width */
        }
        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }

        /* Center Aligning the Form and Table */
        .container {
            width: 50%;
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>MENU</MENU></h1>
        <table>
            <tr>
                <th>Order</th>
                <th>Amount</th>
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

        <form method="POST" action="receipt.php">
            <label for="order">Select an order</label>
            <select name="order" id="order" onchange="updateTotal()">
                <option value="Burger" data-price="50">Burger</option>
                <option value="Fries" data-price="75">Fries</option>
                <option value="Steak" data-price="150">Steak</option>
            </select>

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" required min="1" oninput="updateTotal()">

            <input type="hidden" name="totalAmount" id="totalAmount">

            <label for="cash">Cash</label>
            <input type="number" name="cash" id="cash" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function updateTotal() {
            const orderSelect = document.getElementById('order');
            const quantityInput = document.getElementById('quantity');
            const totalAmountInput = document.getElementById('totalAmount');

            // Get the selected order price
            const selectedOption = orderSelect.options[orderSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            // Calculate total amount
            const totalAmount = price * quantityInput.value;

            // Update totalAmount input
            totalAmountInput.value = totalAmount;
        }
    </script>
</body>
</html>


