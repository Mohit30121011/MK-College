<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = $_POST['studentName'];
    $studentID = $_POST['studentID'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $amount = $_POST['amount'];
    $paymentMethod = $_POST['paymentMethod'];

    $sql = "INSERT INTO fee_payments (student_id, amount, payment_method, status) 
            VALUES (?, ?, ?, 'pending')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$studentID, $amount, $paymentMethod]);

    echo "Fee payment request submitted. Please complete the payment.";
}
?>
