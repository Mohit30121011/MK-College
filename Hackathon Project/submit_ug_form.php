<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $course = $_POST['course'];

    $tenth = $_FILES['tenth']['name'];
    $twelfth = $_FILES['twelfth']['name'];
    $aadhar = $_FILES['aadhar']['name'];
    $idproof = $_FILES['idproof']['name'];
    $photo = $_FILES['photo']['name'];
    $signature = $_FILES['signature']['name'];

    $upload_dir = 'uploads/';
    move_uploaded_file($_FILES['tenth']['tmp_name'], $upload_dir . $tenth);
    move_uploaded_file($_FILES['twelfth']['tmp_name'], $upload_dir . $twelfth);
    move_uploaded_file($_FILES['aadhar']['tmp_name'], $upload_dir . $aadhar);
    move_uploaded_file($_FILES['idproof']['tmp_name'], $upload_dir . $idproof);
    move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $photo);
    move_uploaded_file($_FILES['signature']['tmp_name'], $upload_dir . $signature);

    $sql = "INSERT INTO ug_admissions (name, dob, gender, email, phone, address, course, tenth, twelfth, aadhar, idproof, photo, signature)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $name, $dob, $gender, $email, $phone, $address, $course, $tenth, $twelfth, $aadhar, $idproof, $photo, $signature);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='home.html';</script>";
        } else {
            echo "<script>alert('Error, Application was not submitted, Please try again!'); window.location.href='Ugp_Admission.html';</script>";
        }
    } else {
        echo "<script>alert('Email not found. Please register first.'); window.location.href='register.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
