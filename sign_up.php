<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jain";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST variables are set
if (isset($_POST['tb1'], $_POST['tb2'], $_POST['tb3'], $_POST['tb4'], $_POST['tb5'], $_POST['tb6'])) {
    $USER = $_POST['tb1'];
    $FULL_NAME = $_POST['tb2'];
    $MOBILE_NUMBER = $_POST['tb3'];
    $EMAIL = $_POST['tb4'];
    $PASS = $_POST['tb5'];
    $CONFIRM_PASSWORD = $_POST['tb6'];

    // Validate password confirmation
    if ($PASS !== $CONFIRM_PASSWORD) {
        die("Password and confirm password do not match.");
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO branch (USERNAME, FULL_NAME, MOBILE_NUMBER, EMAIL, PASS, CONFORM_PASSWORD) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $USER, $FULL_NAME, $MOBILE_NUMBER, $EMAIL, $PASS, $CONFIRM_PASSWORD);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please fill in all fields.";
}

$conn->close();
?>
