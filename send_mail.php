<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Connecting to the database using PDO
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'pelacek_cassidy_portfolio1';

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$errmsg = array();

// Check form items for errors
// $first = isset($_POST['first']) ? $_POST['first'] : '';
// $last = isset($_POST['last']) ? $_POST['last'] : '';
// $email = isset($_POST['email']) ? $_POST['email'] : '';
// $message = isset($_POST['message']) ? $_POST['message'] : '';



$lname = mysqli_real_escape_string($connection, $_POST['lname']);
if ($lname == NULL) {
    $errors[] = "Last name field is empty.";
}

$fname = mysqli_real_escape_string($connection, $_POST['fname']);
if ($fname == NULL) {
    $errors[] = "First name field is empty.";
}

$city = mysqli_real_escape_string($connection, $_POST['message']);
if ($message == NULL) {
    $errors[] = "message field is empty.";
}

$email = $_POST['email'];
if ($email == NULL) {
    $errors[] = "Email field is empty.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "\"" . $email . "\" is not a valid email address.";
}

//  // Execute the statement
//  if ($stmt->execute()) {
//     // Send email to myself
//     $email_message = "You have received a new contact form submission:\n\n";
//     $email_message .= "Name: ".$first." ".$last."\n";
//     $email_message .= "Email: ".$email."\n\n";
    
//     $to = 'cassidypelacek@gmail.com';
//     $subject = 'Message from your Portfolio site!';
    
//     mail($to, $subject, $email_message);

$errcount = count($errors);
if ($errcount > 0) {
    $errmsg = array();
    for ($i = 0; $i < $errcount; $i++) {
        $errmsg[] = $errors[$i];
    }
    echo json_encode(array("errors" => $errmsg));
} else {
    $querystring = "INSERT INTO pelacek_cassidy_portfolio1(id, lname, fname, message, email) 
    VALUES(NULL, '" . $last . "', '" . $first . "', '" . $message . "', '" . $email . "')";
    $qpartner = mysqli_query($connection, $querystring);
    echo json_encode(array("message" => "Form submitted. Thank you for your interest!"));
}
?>