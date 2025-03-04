<?php
header("Content-Type: application/json; charset=UTF-8");

// Connecting to the database using PDO
require_once('includes/connect.php');

$first = trim($_POST['fname'] ?? '');
$last = trim($_POST['lname'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');


// Initialize an array for errors
$errors = array();

// Check form items for errors

if (empty($first)) {
    $errors[] = 'First Name can\'t be empty';
}

if (empty($last)) {
    $errors[] = 'Last Name can\'t be empty';
}

if (empty($message)) {
    $errors[] = 'Comment field can\'t be empty';
}

if (empty($email)) {
    $errors[] = 'You must provide an email';
}

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'You must provide a REAL email';
}

$errcount = count($errors);
if ($errcount > 0) {
    $errmsg = array();
    for ($i = 0; $i < $errcount; $i++) {
        $errmsg[] = $errors[$i];
    }
    echo json_encode(["errors" => $errors]);
} else {
  try {
        // Securely insert into database using prepared statements
        $stmt = $connection->prepare("INSERT INTO contact (first, last, email, message) VALUES (:first, :last, :email, :message)");
        $stmt->bindParam(':first', $first, PDO::PARAM_STR);
        $stmt->bindParam(':last', $last, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->execute();
        echo json_encode(array("message" => "Form submitted. Thank you for your interest!"));
    } catch (PDOException $e) {
        echo json_encode(["errors" => ["Database error: " . $e->getMessage()]]);
    }
}
?>

