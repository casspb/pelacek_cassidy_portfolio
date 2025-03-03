<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id,title FROM projects ORDER BY title ASC');
$stmt->execute();


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">

</head>
<body>

<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

  echo  '<p class="project-list">'.
  $row['title'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['id'].'">delete</a></p>';
}

$stmt = null;

?>
<br><br><br>
<h3>Get in Touch!</h3>
<form action="sendmail.php" method="post">
    <label for="subject">Subject: </label>

    <select name="subject" id="subject">
  <option value="">--Please choose a subject--</option>

<?php
$stmt2 = $connection->prepare('SELECT subject FROM contacts GROUP BY subject ORDER BY subject ASC');
$stmt2->execute();

while ($subjects = $stmt2->fetch(PDO::FETCH_ASSOC)) {
  echo '<option value="'.$subjects['subject'].'">'.$subjects['subject'].'</option>';
}

?>

  </select>




    <br><br>
    <label for="fullname">Name: </label>
    <input name="fullname" type="text" required><br><br>
    <label for="email">Email: </label>
    <input name="email" type="email" required><br><br>
    <label for="desc">details: </label>
    <textarea name="desc" required></textarea><br><br>
    <input name="submit" type="submit" value="Add">
</form>

</body>
</html>

<?php

/*
while ($subjects = $stmt2->fetch(PDO::FETCH_ASSOC)) {
  echo '<option value="'.$subjects['subject'].'">'.$subjects['subject'].'</option>';
  }

   

$stmt2 = $connection->prepare('SELECT subject FROM contacts GROUP BY subject ORDER BY subject ASC');
$stmt2->execute();


*/
?>