<!DOCTYPE html>
<html lang="en">

<?php
require_once('includes/connect.php');

// Fetch the project details
$query = 'SELECT * FROM project WHERE id = ' . $_GET['id'];
$query_categories = 'SELECT project.id AS project_id, category.id AS category_id, category.category AS category_name
                     FROM project
                     JOIN project_category ON project.id = project_category.project_id
                     JOIN category ON category.id = project_category.category_id';

$results = mysqli_query($connect, $query);
$categories_results = mysqli_query($connect, $query_categories);
$row = mysqli_fetch_assoc($results);

// Fetch all media related to this project
$queryMedia = 'SELECT media FROM media WHERE project_id = ' . $_GET['id'] . ' ORDER BY media.id ASC';
$mediaResults = mysqli_query($connect, $queryMedia);
$mediaArray = [];

// Store each media filename in an array
while ($mediaRow = mysqli_fetch_assoc($mediaResults)) {
    $mediaArray[] = $mediaRow['media'];  
}

$project_categories = [];
// Create an associative array with project_id as key and category_name as value
while ($category_row = mysqli_fetch_array($categories_results)) {
    $project_categories[$category_row['project_id']][] = $category_row['category_name'];
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Cassidy Pelacek Project</title>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>

<body>
   
    <header>
        <a href="index.php" class="logo"><img src="images/cassID-logo.svg" alt="cass ID logo"> </a>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar"><img src="images/green-star.svg" class="menu-star"> </label>
    
        <nav class="navbar">
            <ul>
                <li id="section1Btn"><a href="#">contact <img src="images/cassID-star.svg" class="link-star"></a> </li>
                <li id="section2Btn"><a href="#">works<img src="images/cassID-star.svg" class="link-star"> </a></li>
                <li id="section3Btn"><a href="index.php">about me<img src="images/cassID-star.svg" class="link-star"></a> </li>
                <li id="section4Btn"><a href="index.php">testimonials<img src="images/cassID-star.svg" class="link-star"></a> </li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="title grid-con">
            <h1 class="col-span-full"><?php echo $row['name']; ?> <img class="title-star" src="images/cassID-star.svg" alt="logo star"></h1>
            <div class="sorting-buttons-container title-buttons col-start-1 col-span-full m-col-start-1 m-col-span-6">
            <?php

             foreach ($project_categories[$row['id']] as $category_name) {
                echo '<div class="sorting-buttons"><p>' . $category_name . '</p></div>';
                }
                ?>
             </div>
   
            <div class="project-base col-span-4 m-col-span-6">
                <p><?php echo $row['company']; ?></p>
                <p>Role: <?php echo $row['role']; ?></p>
            </div>
            <div class="project-base col-span-4 m-col-span-6">
                <p>URL: <?php echo $row['url']; ?></p>
                <p>Year: <?php echo $row['year']; ?></p>
            </div>
        </section>

        <div class="full-width-grid-con secondary-background-fill">
            <div class="project-about grid-con">
                <h1 class="col-span-full">About</h1>
                <p class="col-span-full"><?php echo $row['description']; ?> </p>

              
                <img class="about-image col-span-2 m-col-span-6" src="images/<?php echo $mediaArray[0]; ?>" alt="Project Image">
                <img class="about-image col-span-2 m-col-span-6" src="images/<?php echo $mediaArray[1]; ?>" alt="Project Image">
            
            </div>
        </div>

        <section class="full-width-grid-con feedback">
            <div class="grid-con">
                <h1 class="col-span-full">Challenges & Feedback</h1>
                <p class="col-span-full"><span>Feedback:</span><?php echo $row['feedback']; ?></p>
                <p class="col-span-full"><span>Challenges:</span> <?php echo $row['challenges']; ?></p>
            </div>
        </section>

        <section class="full-width-grid-con photo-gallery">
            <div class="grid-con">
        
                <img class="col-span-full" src="images/<?php echo $mediaArray[2]; ?>" alt="Project Image">
            
                <img class="col-span-2 m-col-span-6" src="images/<?php echo $mediaArray[3]; ?>" alt="Project Image">
                <img class="col-span-2 m-col-span-6" src="images/<?php echo $mediaArray[5]; ?>" alt="Project Image">
                <img class="col-span-2 m-col-span-6" src="images/<?php echo $mediaArray[5]; ?>" alt="Project Image">
                <img class="col-span-2 m-col-span-6" src="images/<?php echo $mediaArray[6]; ?>" alt="Project Image">
            </div>
        </section>

        <section class="toolkit grid-con">
            <h1 class="col-span-full">Toolkit</h1>
            <img class="col-span-1 m-col-start-3 m-col-span-2" src="images/illustrator.svg" alt="illustrator logo">
            <img class="col-span-1 m-col-span-2 " src="images/after-effects.svg" alt="after-effects logo">
            <img class="col-span-1 m-col-span-2 " src="images/photoshop.svg" alt="photoshop logo">
            <img class="col-span-1 m-col-span-2" src="images/lightroom.svg" alt="lightroom logo">
        </section>
    </main>

    <footer>
        <section class="contact" id="section1">
            <h1>CONTACT</h1>
            <h2>TIME TO REACH OUT?</h2>
        
            <form action="/submit" method="POST" class="contact-form grid-con">
                <div class="col-span-full l-col-start-2 l-col-end-7">
                    <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
                </div>
                <div class="col-span-full l-col-start-7 l-col-end-12">
                    <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
                </div>
                <div class="col-span-full l-col-start-2 l-col-end-12 ">
                    <input type="email" id="email" name="email" placeholder="sayhello@gmail.com" required>
                </div>
                <div class="col-span-full l-col-start-2 l-col-end-12 ">
                    <textarea id="message" name="message" placeholder="lets talk about the piece of ID you are missing!" rows="4" required></textarea>
                </div>
                <div class="col-start-3 col-span-2 m-col-start-10 m-col-span-3 l-col-start-10 l-col-end-12">
                    <button type="submit">SEND</button>
                </div>
            </form>
        </section>

        <div class="bottom-footer">
            <p>wow! made it all the way here! <br> might as well check out a bit more!</p>
            <ul class="footer-svg">
                <li> <a href=""><img src="images/instagram-svgrepo-com (1).svg" alt="instagram logo"></a></li>
                <li> <a href=""><img src="images/linkedin-161-svgrepo-com.svg" alt="linkedin logo"></a></li>
                <li> <a href=""><img src="images/github-svgrepo-com.svg" alt="github logo"></a></li>
                <li>  <a href=""><img src="images/spotify-162-svgrepo-com.svg" alt="spotify logo"></a></li>
            </ul>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/ScrollToPlugin.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/scroll-animation.js"></script>
</body>

</html>
