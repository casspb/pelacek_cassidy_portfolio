<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Connecting to the database using PDO
require_once('includes/connect.php');

// Gather elements from the submitted form
$first = $_POST['fname'];
$last = $_POST['lname'];
$email = $_POST['email'];
$message = $_POST['message'];

// Initialize an array for errors
$errors = array();

// Check form items for errors
$first = trim($first);
$last = trim($last);
$email = trim($email);
$message = trim($message);

if (empty($first)) {
    $errors['first'] = 'First Name can\'t be empty';
}

if (empty($last)) {
    $errors['last'] = 'Last Name can\'t be empty';
}

if (empty($message)) {
    $errors['message'] = 'Comment field can\'t be empty';
}

if (empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL email';
}

$errcount = count($errors);
if ($errcount > 0) {
    $errmsg = array();
    for ($i = 0; $i < $errcount; $i++) {
        $errmsg[] = $errors[$i];
    }
    echo json_encode(["errors" => $errors]);
} else {
   // try {
        // Securely insert into database using prepared statements
        $querystring = $connection->prepare("INSERT INTO contact (id, first, last, email, message) VALUES (NULL, '" . $lname . "','" . $fname . "','" . $message . "','" . $email . "')";
        // // Bind the correct form values
        // $stmt->bindParam(':first', $first, PDO::PARAM_STR);
        // $stmt->bindParam(':last', $last, PDO::PARAM_STR);
        // $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        // $stmt->bindParam(':message', $message, PDO::PARAM_STR);

        $qpartner = mysqli_query($connection, $querystring);
        echo json_encode(array("message" => "Form submitted. Thank you for your interest!"));
   
    // } catch (PDOException $e) {
    //     echo json_encode(["errors" => ["Database error: " . $e->getMessage()]]);
    // }
}
?>
