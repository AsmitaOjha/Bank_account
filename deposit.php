<?php
// Include database connection code here
$servername = "localhost";
$username = "root";
$password = "";
$database = "bank_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session to access the account number created in create_account.php
session_start();

// Retrieve the account number from the session
if (isset($_SESSION['account_number'])) {
    $account_number_created = $_SESSION['account_number'];
} else {
    // Handle the case where the account number is not available in the session
    // You can redirect the user or display an error message.
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_account_number = $_POST['account_number'];
    $deposit_amount = $_POST['deposit_amount'];
    $deposit_date = $_POST['deposit_date'];

    // Validate and sanitize user input (add more validation as needed)

    // Verify the entered account number against the one created in create_account.php
    if ($entered_account_number == $account_number_created) {
        // Proceed with the deposit process as the account number matches
        // You can implement the deposit logic here.
    } else {
        // Display an error message indicating an invalid account number
        echo "Invalid account number. Please enter a valid account number.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Include any necessary styles or scripts here -->
</head>
<body>
    <h1>Make a Deposit</h1>
    <form method="post" action="">
        <label for="account_number">Account Number:</label>
        <input type="text" id="account_number" name="account_number" required>

        <label for="deposit_amount">Deposit Amount:</label>
        <input type="text" id="deposit_amount" name="deposit_amount" required>

        <label for="deposit_date">Deposit Date:</label>
        <input type="text" id="deposit_date" name="deposit_date" required>

        <button type="submit">Deposit</button>
    </form>
</body>
</html>
