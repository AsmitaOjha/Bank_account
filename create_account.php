<?php
// Include database connection code here (use mysqli or PDO).
$servername = "localhost";
$username = "root";
$password = "";
$database = "bank_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data, validate input, and insert account information into the database.
    // Redirect to the main page or display a success message.
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Include any necessary styles or scripts here -->
</head>
<body>
    <h1>Create Account</h1>
    <form method="post" action="">
        <!-- Create account form here -->
        <label for="account_holder">Account Holder Name:</label>
        <input type="text" id="account_holder" name="account_holder" required>

        <label for="account_number">Account Number:</label>
        <input type="text" id="account_number" name "account_number" required>

        <label for="initial_balance">Initial Balance:</label>
        <input type="text" id="initial_balance" name="initial_balance" required>

        <button type="submit">Create Account</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form data and insert account information into the database
        $account_holder = $_POST['account_holder'];
        $account_number = $_POST['account_number'];
        $initial_balance = $_POST['initial_balance'];

        // Validate and sanitize user input
        // You should add more thorough validation and error handling

        // Insert the data into the database
        $sql = "INSERT INTO accounts (account_holder, account_number, balance) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $account_holder, $account_number, $initial_balance);

        if ($stmt->execute()) {
            // Account created successfully
            echo "Account created successfully!";
        } else {
            // Error handling for account creation
            echo "Error creating account: " . $stmt->error;
        }

        $stmt->close();
    }
    ?>

</body>
</html>
