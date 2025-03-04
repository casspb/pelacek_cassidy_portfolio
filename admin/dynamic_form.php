<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/connect.php');
$stmt = $connection->prepare('SELECT id,name FROM project ORDER BY name ASC');
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
  $row['name'].
  '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.

  '<a href="delete_project.php?id='.$row['id'].'">delete</a></p>';
}

$stmt = null;

?>
