<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);
    
    $to = "ymn.caglar@gmail.com";
    $subject = "[SUPER IMPORTANT] NEW MESSAGE ABOUT FIRE DUDE APPLICATION";
    $message = "This is an automated message issued by " . $name . "\n\n" .
               "Name: " . $name . "\n\n" .
               "Email: " . $email . "\n\n" .
               "Message: " . $message;
    $headers = "From: " . $email;

    mail($to, $subject, $message, $headers);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert form data into database
$sql = "INSERT INTO contacts (name, email, message)
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "Thank you for your message, $name! We'll get back to you soon.";

?>
