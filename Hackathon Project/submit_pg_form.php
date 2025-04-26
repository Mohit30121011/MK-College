<?php
include('db.php');

$stmt = $conn->prepare("INSERT INTO pg_admissions (name, dob, gender, email, phone, address, course, ug_marksheet, pg_entrance, aadhar, idproof, photo, signature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "sssssssssssss",
    $name,
    $dob,
    $gender,
    $email,
    $phone,
    $address,
    $course,
    $ug_marksheet,
    $pg_entrance,
    $aadhar,
    $idproof,
    $photo,
    $signature
);

$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$course = $_POST['course'];

$ug_marksheet = uploadFile('ug_marksheet');
$pg_entrance = uploadFile('pg_entrance');
$aadhar = uploadFile('aadhar');
$idproof = uploadFile('idproof');
$photo = uploadFile('photo');
$signature = uploadFile('signature');

if ($stmt->execute()) {
    echo "Application submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

function uploadFile($fieldName) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES[$fieldName]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFilePath)) {
        return $targetFilePath;
    } else {
        die("Error uploading file: " . $fieldName);
    }
}
?>
