<?php
require_once('../includes/connect.php');

// The uploading part is done entirely by the form; the form uploads the file to a temporary location, with some metadata information about the file in the $_FILES array, which we can use to move the file to its final location.

// If the script finishes and nothing happens with the original uploaded file, the file will be automatically deleted


// We assume at minimum that the file may have a name that is not web-safe, with spaces or other characters, AND that the name might be already used in the database (It would delete the original file if so). We also assume that the file extension may not be web-safe, or that it may be a dangerous file type, like an .exe executable.

// So we want to do this FIRST, as we need a new name for the file and for the DB insert part of the script below



// create a unique, web-safe name for the image in a $newname variable

$random = rand(10000,99999); //generates a random number between 10000 and 99999
$newname = 'image'.$random; // will store something like 'image49814'


// PHP can get the original file extension (without the '.'). It also makes sure the extension is lowercase, so 'JPG' becomes 'jpg'.

$filetype = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

//check to see if the extension is allowed, for example...

if($filetype == 'jpeg') {
  $filetype = 'jpg'; // we want to save it as 'jpg', not 'jpeg'
}

if($filetype == 'exe') {
  exit('nice try'); // we don't want to save executable files
}


// ...and then append it to our new name, with the '.', so 'image49814' becomes 'image49814.jpg'. This is ALL we want to insert into the database!
$newname .= '.'.$filetype;

// Add the path to 'images' to the front of the new name, so now we have the full save path for the image file
$target_file = '../images/'.$newname;



// IF and ONLY if the file is uploaded successfully, insert the data into the database

// This is the only place the database is touched, so if the file fails to upload, no data is inserted. We tie the steps together because we don't want a record in the database without an image, or an image without a record in the database.

if(move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {  //moves the tmp file to its final location, with its new name, before it is automatically deleted


// PDO database insert

$query = "INSERT INTO projects (title,description,image_url) VALUES (?,?,?)";
$stmt = $connection->prepare($query);
$stmt->bindParam(1, $_POST['title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['desc'], PDO::PARAM_STR);
$stmt->bindParam(3, $newname, PDO::PARAM_STR);  //note the $newname used here!
$stmt->execute();



$stmt = null;

//Now, use the newly created id in a second query, to insert as a foreign key (project_id) into media, other tables where project_id is needed.

//new INSERT query for media table, with the filename and the foreign key




header('Location: project_list.php');
}






 /* Check if image file is a actual image or another malicious file
    if(isset($_POST['submit'])) {
        $check = getimagesize($_FILES['uploaded']['tmp_name']);
        if($check !== false) {
            echo 'File is an image - ' . $check['mime'] . '.';
            $uploadOk = 1;
        } else {
            echo 'File is not an image.';
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo 'Sorry, file already exists.';
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['uploaded']['size'] > 500000) { // 500KB limit
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'
    && $imageFileType != 'gif' ) {
        echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
    }else{

    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo 'Sorry, your file was not uploaded.';
    // if everything is ok, try to upload file
    } else {
if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file)) {
            echo 'The file '.$target_file.' has been uploaded.';
        } else {
            echo 'Sorry, there was an error uploading your file.';
        }
    }
*/



?>