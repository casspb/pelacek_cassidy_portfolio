<?php

// Connecting to the database using PDO
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
    // Use PDO to prepare the statement and bind parameters to avoid SQL injection
    try {
        $stmt = $connection->prepare("INSERT INTO contact (first, last, email, message) VALUES (:first, :last, :email, :message)");

        // Bind the form data to the prepared statement
        $stmt->bindParam(':first', $first, PDO::PARAM_STR);
        $stmt->bindParam(':last', $last, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

        // Execute the statement
        if ($stmt->execute()) {
            // Send email to myself
            $email_message = "You have received a new contact form submission:\n\n";
            $email_message .= "Name: ".$first." ".$last."\n";
            $email_message .= "Email: ".$email."\n\n";
            
            $to = 'cassidypelacek@gmail.com';
            $subject = 'Message from your Portfolio site!';
            
            mail($to, $subject, $email_message);

            // Redirect to the index page
            header('Location: sent-message.html');
            exit;
        } else {
             echo "There was an error submitting the form.";
        }
        //catch for PDO errors as well, since I have a lot of issues with it AHHH
    } catch (PDOException $e) {
      
        echo "Error: " . $e->getMessage();
    }
} else {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}
?>

