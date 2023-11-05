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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generate a unique account number (e.g., using a timestamp)
    $account_number = "ACC-" . time();

    // Get user input from the form
    $account_holder = $_POST['account_holder'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $balance = $_POST['balance'];

    // Validate and sanitize user input (add more validation as needed)

    // Insert data into the database
    $sql = "INSERT INTO accounts (account_number, account_holder, address, phone_number, balance) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $account_number, $account_holder, $address, $phone_number, $balance);

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

<!DOCTYPE html>
<html>
<head>
    <!-- Include any necessary styles or scripts here -->
</head>
<body>
    <h1>Create Account</h1>
    <form method="post" action="">
        <label for="account_holder">Account Holder Name:</label>
        <input type="text" id="account_holder" name="account_holder" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="balance">Initial Balance:</label>
        <input type="text" id="balance" name="balance" required>

        <button type="submit">Create Account</button>
    </form>
</body>
</html>
