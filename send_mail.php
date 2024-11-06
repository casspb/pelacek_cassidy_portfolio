
<?php

//connecting to the database
require_once('includes/connect.php');

//gather elements fro the submitted form

$first = $_POST['first-name'];
$last = $_POST['last-name'];
$email = $_POST['email'];
$message = $_POST['message'];

//check form items for errors

$first = trim($first);
$last = trim($last);
$email = trim($email);
$message = trim($message);



//insert new row in the contacts table

$query = "INSERT INTO contact (id, first, last, email, message) VALUES (NULL, '".$first."', '".$last."', '".$email."','".$message."')";

mysqli_query($connect,$query);

header('Location: index.php');

//format an email and email it to myself


?>