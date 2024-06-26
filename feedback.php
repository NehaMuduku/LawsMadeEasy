<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $category = $_POST["category"];
    $comments = $_POST["comments"];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (name, category, comments) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    echo "<h1>Thank you for your feedback!</h1>";

    $stmt->bind_param("sss", $name, $category, $comments);

    if ($stmt->execute()) {
        $successMessage = "Thank you for your feedback!";
    } else {
        $errorMessage = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
