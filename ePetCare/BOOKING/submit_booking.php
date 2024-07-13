<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petcare_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST['service'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO bookings (service, name, email) VALUES ('$service', '$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> window.location = '../Booking/Booking.html';alert('Booking Confirmed!');</script>";
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
