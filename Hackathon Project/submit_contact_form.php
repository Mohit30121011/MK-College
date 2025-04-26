<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!empty($name) && !empty($email) && !empty($message)) {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Thank you for your message! We will get back to you soon.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill out all fields.";
    }
}
?>
