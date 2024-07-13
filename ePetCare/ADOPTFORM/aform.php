<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petcare_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$pet = $conn->real_escape_string($_POST['pet']);

// Insert into database
$sql = "INSERT INTO adoption_requests (name, pet) VALUES ('$name', '$pet')";

if ($conn->query($sql) === TRUE) {
    // Close connection
    $conn->close();

    // Alert message
    echo "<script>alert('Thank you for adoption! Please visit our nearby outlet for further process.');</script>";

    // Redirect back to the form
    echo "<script>window.location.href='../ADOPTFORM/aform.HTML';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
