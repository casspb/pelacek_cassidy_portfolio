<!DOCTYPE html>
<html lang="en">
<?php

require_once('includes/connect.php');

$query_projects = 'SELECT id AS project_id, name, year FROM project';
$query_testimonials = 'SELECT id AS testimonial_id, name, job, testimonial FROM testimonials';
$query_categories = 'SELECT DISTINCT category.category AS category_name 
                     FROM category';

$projects_results = mysqli_query($connect, $query_projects);
$testimonials_results = mysqli_query($connect, $query_testimonials);
$categories_results = mysqli_query($connect, $query_categories);

// Create an associative array to map project_id to category name
$project_categories = [];
$query_categories_details = 'SELECT project.id AS project_id, category.category AS category_name
                             FROM project
                             JOIN project_category ON project.id = project_category.project_id
                             JOIN category ON category.id = project_category.category_id';
$categories_details_results = mysqli_query($connect, $query_categories_details);
while ($category_row = mysqli_fetch_array($categories_details_results)) {
    $project_categories[$category_row['project_id']][] = $category_row['category_name'];
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title class="hidden">Cassidy Pelacek Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
<header>
    <a href="index.php" class="logo"><img src="images/cassID-logo.svg" alt="cass ID logo"> </a>
    <input type="checkbox" id="menu-bar">
    <label for="menu-bar"><img src="images/green-star.svg" class="menu-star"> </label>

    <nav class="navbar">
        <ul>
            <li id="section1Btn"><a href="#">contact <img src="images/cassID-star.svg" class="link-star"></a></li>
            <li id="section2Btn"><a href="#">works<img src="images/cassID-star.svg" class="link-star"> </a></li>
            <li id="section3Btn"><a href="#">about me<img src="images/cassID-star.svg" class="link-star"></a></li>
            <li id="section4Btn"><a href="#">testimonials<img src="images/cassID-star.svg" class="link-star"></a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="header-image full-width-grid-con">
        <h1 class="hidden">header image</h1>
        <model-viewer class="col-span-full" src="model/id-card.gltf" ar ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="neutral" shadow-intensity="1" camera-orbit="180deg 86.07deg 696m" field-of-view="20.11deg">
            <button class="Hotspot" slot="hotspot-1" data-position="149.9862980018935m 96.43430030990552m 0m" data-normal="0m 0m -1m" data-visibility-attribute="visible">
                <div class="HotspotAnnotation"></div>
            </button>
        </model-viewer>
        <img src="images/cassID-card.svg" alt="placeholder for ID card" class="id-card col-span-full">
    </section>

    <section id="section3" class="about-me-section col-span-full">
        <h1> Hello I'm Cassidy!</h1>
        <p>Welcome to my corner of creativity, and a place to dive into a new adventure- like finding that elusive ID card tucked away in the depths of your wallet! 
                <br> Over the years, Ive been on a journey to discover my own identity, or as I like to call it, my “CassID.” Throughout this journey I've discovered my love for code, and Front-end development, and Back-end!</p>
        </section>

    <section class="project-video-section col-span-full">
        <h1 class="hidden">Project Roundup Video</h1>
        <div id="player-container">
            <video controls preload="metadata" poster="images/scrapbook-cover-collage.png">
                <source src="video/pelacek-cassidy-demo-reel-1.mp4" type="video/mp4">
                <p>Your browser does not support the video tag.</p>
            </video>
        </div>
    </section>

    <div id="section2" class="full-width-grid-con projects-card-section">
        <div class="project-works-section grid-con">
            <div class="col-span-full">
                <h1 class="col-span-full">Works</h1>
                <div class="sorting-buttons-container">
                <?php
            // Display the category buttons
            while ($category_row = mysqli_fetch_array($categories_results)) {
                echo '<div class="sorting-buttons" data-category="' . $category_row['category_name'] . '">
                        <p>' . $category_row['category_name'] . '</p>
                      </div>';
            }
            ?>
                </div>
            </div>
        </div>

        <div class="grid-con">
            <div class="container" id="container1"></div>
            <div class="container" id="container2"></div>
            <div class="container" id="container3"></div>

            <?php
    while ($row = mysqli_fetch_array($projects_results)) {
        $project_id = $row['project_id'];
        $category_names = isset($project_categories[$project_id]) ? $project_categories[$project_id] : [];

        // Combine categories into a string to use as a data attribute
        $categories_string = implode(' ', $category_names);

        echo '
            <div class="project-card col-span-4 m-col-span-6 l-col-span-6" data-categories="' . $categories_string . '">
                <img src="images/pexels-ron-lach-8129898.jpg" alt="Project 1 Image" class="project-image">
                <div class="content-overlay">
                    <h2>' . $row['name'] . '</h2>
                    <p>Check out this project - ' . $row['year'] . '</p>
                    <div class="sorting-buttons-variation">
                        <p>' . implode(', ', $category_names) . '</p>  
                     </div>
                    <div class="arrow">
                        <a href="project.php?id=' . $row['project_id'] . '">
                            <img src="images/arrow-up-right.svg" alt="Arrow Icon">
                        </a>
                    </div>
                </div>
            </div>';
    }
    ?>

        
        </div>
    </div>
</main>

<footer>
    <div id="section4" class="thank-you">
        <h1 class="col-span-full">THANK YOU</h1>
        <h2 class="col-span-full">TESTIMONIAL</h2>
    </div>
    <div class="testimonial-section">
        <h1 class="hidden">Testimonies</h1>
        <div class="testimonial-carousel">
            <?php
            while($row = mysqli_fetch_array($testimonials_results)) {
                echo '
                    <div class="testimonial">
                        <h3>' . $row['name'] . ', ' . $row['job'] . '</h3>
                        <p class="text-container">
                            <svg class="background-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.06 36.794">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fffaff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1" d="M23.123,6.317S22.553.061,22.511.062c-.022,0,1.297,3.755.57,7.49C21.111,17.672,4.6,25.175.565,33.454c-.549,1.127-.934,2.405,0,3,1.656,1.055,6.5-.65,7.573-1,4.996-1.628,17.979-3.085,53.922-2"/>
                                <line class="cls-1" x1="21.769" x2="62.06" y2="33.454"/>
                            </svg>
                            ' . $row['testimonial'] . '
                        </p>
                    </div>';
            }
            ?>
        </div>
    </div>

    <div class="star-divider">
        <img src="images/green-star.svg" alt="green-star">
        <img src="images/green-star.svg" alt="green-star">
        <img src="images/green-star.svg" alt="green-star">
    </div>

    <section class="contact" id="section1">
        <h1>CONTACT</h1>
        <h2>TIME TO REACH OUT?</h2>
        <form action="send_mail.php" method="POST" class="contact-form grid-con">
            <div class="col-span-full l-col-start-2 l-col-end-7">
                <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
            </div>
            <div class="col-span-full l-col-start-7 l-col-end-12">
                <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
            </div>
            <div class="col-span-full l-col-start-2 l-col-end-12">
                <input type="email" id="email" name="email" placeholder="sayhello@gmail.com" required>
            </div>
            <div class="col-span-full l-col-start-2 l-col-end-12">
                <textarea id="message" name="message" placeholder="Let's talk about the piece of ID you're missing!" rows="4" required></textarea>
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

<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/ScrollToPlugin.min.js"></script>
<script src="js/background-stars.js"></script>
<script src="js/id-card.js"></script>
<script src="js/testimonial-carousel.js"></script>
<script src="js/scroll-animation.js"></script>
<script src="js/sorting.js"></script>
</body>

</html>
