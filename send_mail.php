
<?php

// Connecting to the database
require_once('includes/connect.php');

// Gather elements from the submitted form
$first = $_POST['first-name'];
$last = $_POST['last-name'];
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

if (empty($errors)) {
    // Escape form data for security
    $first = mysqli_real_escape_string($connect, $first);
    $last = mysqli_real_escape_string($connect, $last);
    $email = mysqli_real_escape_string($connect, $email);
    $message = mysqli_real_escape_string($connect, $message);

    // Insert new row into the contacts table
    $query = "INSERT INTO contact (first, last, email, message) VALUES ('$first', '$last', '$email', '$message')";

    if (mysqli_query($connect, $query)) {
        // Send email to myself
        $email_message = "You have received a new contact form submission:\n\n";
        $email_message .= "Name: ".$first." ".$last."\n";
        $email_message .= "Email: ".$email."\n\n";
        
        $to = 'cassidypelacek@gmail.com';
        $subject = 'Message from your Portfolio site!';
        
        mail($to, $subject, $email_message);

        // Redirect to the index page
        header('Location: index.php');
    } else {
        // If query fails, output error
        echo 'Error: ' . mysqli_error($connect);
    }
} else {
    // Output validation errors
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}

?>
