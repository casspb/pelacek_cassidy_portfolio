<!DOCTYPE html>
<html lang="en">
<?php

require_once('includes/connect.php');  

// Fetch data for projects, testimonials, and categories
$query_projects = 'SELECT id AS project_id, name, year, mainImage FROM project';
$query_testimonials = 'SELECT id AS testimonial_id, name, job, testimonial FROM testimonials';
$query_categories = 'SELECT DISTINCT category.category AS category_name 
                     FROM category';

// Preparing and executing project query
$stmt = $connection->prepare($query_projects);
$stmt->execute();
$projects_results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$stmt = null;  

// Preparing and executing testimonial query
$stmt = $connection->prepare($query_testimonials);
$stmt->execute();
$testimonials_results = $stmt->fetchAll(PDO::FETCH_ASSOC);  
$stmt = null;  

// Preparing and executing categories query
$stmt = $connection->prepare($query_categories);
$stmt->execute();
$categories_results = $stmt->fetchAll(PDO::FETCH_ASSOC);  
$stmt = null;  


$project_categories = [];
$query_categories_details = 'SELECT project.id AS project_id, category.category AS category_name
                             FROM project
                             JOIN project_category ON project.id = project_category.project_id
                             JOIN category ON category.id = project_category.category_id';

$stmt = $connection->prepare($query_categories_details);
$stmt->execute();
$categories_details_results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
$stmt = null; 


foreach ($categories_details_results as $category_row) {
    $project_categories[$category_row['project_id']][] = $category_row['category_name'];
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title class="hidden">Cassidy Pelacek Portfolio</title>

    <!-- External scripts with async (non-blocking) -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js" async></script>

    <!-- defer -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.0/ScrollToPlugin.min.js" defer></script>
    <script src="js/background-stars.js" defer></script>
    <script src="js/id-card.js" defer></script>
    <script src="js/testimonial-carousel.js" defer></script>
    <script src="js/scroll-animation.js" defer></script>
    <script src="js/sorting.js" defer></script>
    <script src="js/toolkit.js" defer></script>
    <script src="js/main.js" defer></script>
    <script src="js/contact.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" async></script>
    <script src="js/scroll-trigger.js" defer></script>


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
            <model-viewer class="col-span-full" src="model/id-card.gltf" disable-zoom  ar ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="neutral" shadow-intensity="1"  camera-orbit="180deg 86.07deg 1500m"  field-of-view="10.11deg">
                <button class="Hotspot" slot="hotspot-1" data-position="149.9862980018935m 96.43430030990552m 0m" data-normal="0m 0m -1m" data-visibility-attribute="visible">
                    <div class="HotspotAnnotation"></div>
                </button><button class="Hotspot" slot="hotspot-2" data-position="107.28834771936147m 0.07413567430472767m -2.0929025411605835m" data-normal="0m 0m -1m" data-visibility-attribute="visible">
                    <div class="HotspotAnnotation"></div>
                </button><button class="Hotspot" slot="hotspot-3" data-position="-92.0240793311601m -12.290467959990991m -2.0929025411605835m" data-normal="0m 0m -1m" data-visibility-attribute="visible">
                    <div class="HotspotAnnotation"></div>
                </button><button class="Hotspot" slot="hotspot-4" data-position="-10.633371858709097m -5.590268278052193m 5.940767884254456m" data-normal="0m 0m 1m" data-visibility-attribute="visible">
                    <div class="HotspotAnnotation"></div>
                </button><button class="Hotspot" slot="hotspot-5" data-position="-46.84843244442665m 15.946604821668586m -2.0929025411605835m" data-normal="0m 0m -1m" data-visibility-attribute="visible">
                    <div class="HotspotAnnotation"></div>
                </button>
            
        
              </model-viewer> 

        </section>

        <section id="section3" class="about-me-section full-width-grid-con">
            <h1> Hello I'm Cassidy!</h1>
            <p class="scroll-fade">Welcome to my corner of creativity, and a place to dive into a new adventure- like finding that elusive ID card tucked away in the depths of your wallet! 
                Over the years, Ive been on a journey to discover my own identity, or as I like to call it, my “CassID.” I've discovered my love for code specifically back-end Development!</p>
        </section>

        <section class="project-video-section scroll-fade full-width-grid-con">
            <h1 class="hidden">Project Roundup Video</h1>
            <div id="player-container">
                <video preload="metadata" poster="images/scrapbook-cover-collage.png">
                    <source src="video/pelacek-cassidy-demo-reel-1.mp4" type="video/mp4">
                    <p>Your browser does not support the video tag.</p>
                </video>
                <button class="play-button" id="play-button"><i class="fa fa-play"></i></button>
                <div class="video-controls" id="video-controls" style="display: none;">
                    <button id="pause-button"><i class="fa fa-pause-circle-o"></i></button>
                    <button id="stop-button"><i class="fa fa-stop-circle-o"></i></button>
                    <i class="fa fa-volume-up"></i>
                    <input type="range" id="change-vol" step="0.05" min="0" max="1" value="1">
                    <button id="full-screen"><i class="fa fa-arrows-alt"></i></button>
                </div>
            </div>
        </section>

        <div id="section2" class="full-width-grid-con projects-card-section">
    <div class="project-works-section grid-con">
        <div class="col-span-full">
            <h1 class="col-span-full">Works</h1>
            <div class="sorting-buttons-container">
                
                <?php
                    // category display
                    foreach ($categories_results as $category_row) {
                        echo '<div class="sorting-buttons" data-category="' . $category_row['category_name'] . '">
                                <p>' . $category_row['category_name'] . '</p>
                              </div>';
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="grid-con">
        <!--these are the stars -->
        <div class="container" id="container1"></div>
        <div class="container" id="container2"></div>
        <div class="container" id="container3"></div>

        <?php
        //project display
        foreach ($projects_results as $row) {
            $project_id = $row['project_id'];
            //checks if there is actual things in that project category 
            $category_names = isset($project_categories[$project_id]) ? $project_categories[$project_id] : [];

            // Combine categories into a string
            $categories_string = implode(' ', $category_names);
            $stmt = null; 

            echo '
                <div class="project-card scroll-fade col-span-4 m-col-span-6 l-col-span-6" data-categories="' . $categories_string . '">
                    <img src="images/' . $row['mainImage'] . '" alt="Project Image" class="project-image">
                    <div class="content-overlay">
                        <h2>' . $row['name'] . '</h2>
                        <p>  Created in ' . $row['year'] . '</p>
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
    <section class="toolkit col-span-full">
    <h1 class="col-span-full">Toolkit</h1>
    <div class="toolkit-slider">
        <div class="toolkit-track">
            <img class="toolkit-item" src="images/illustrator.svg" alt="Illustrator">
            <img class="toolkit-item" src="images/after-effects.svg" alt="After Effects">
            <img class="toolkit-item" src="images/photoshop.svg" alt="Photoshop">
            <img class="toolkit-item" src="images/lightroom.svg" alt="Lightroom">
            <!-- Duplicate images for smooth looping  need to add more tools later-->
            <img class="toolkit-item" src="images/illustrator.svg" alt="Illustrator">
            <img class="toolkit-item" src="images/after-effects.svg" alt="After Effects">
            <img class="toolkit-item" src="images/photoshop.svg" alt="Photoshop">
            <img class="toolkit-item" src="images/lightroom.svg" alt="Lightroom">
        </div>
    </div>
</section>
</div>
      
    </main>

<footer>
    <div id="section4" class="thank-you">
        <h1 class="col-span-full">TESTIMONIALS</h1>
        <h2 class="col-span-full">Thank you for your support</h2>
    </div>
    <div class="testimonial-section">
        <h1 class="hidden">Testimonies</h1>
        <div class="testimonial-carousel">
            <?php
                // Loop through testimonials
                foreach ($testimonials_results as $row) {
                    
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
    <form id="contact-form" class="contact-form grid-con">
        <div class="col-span-full m-col-start-2 m-col-end-7">
            
            <input type="text" id="fname" name="fname" placeholder="First Name" >
        </div>
        <div class="col-span-full m-col-start-7 m-col-end-12">
           
            <input type="text" id="lname" name="lname" placeholder="Last Name" >
        </div>
        <div class="col-span-full m-col-start-2 m-col-end-12">
          
            <input type="email" id="email" name="email" placeholder="sayhello@gmail.com" >
        </div>
        <div class="col-span-full m-col-start-2 m-col-end-12">
            <textarea id="message" name="message" placeholder="Let's talk about the piece of ID you're missing!" rows="4"></textarea>
        </div>
        <div class="col-start-3 col-span-2 m-col-start-10 m-col-end-12">
        <input id="submit" type="submit" value="SEND">
        </div>
        <div id="feedback" class="col-span-full m-col-start-2 m-col-end-12"></div>
    </form>

</section>



<div class="bottom-footer">
            <p>wow! made it all the way here! <br> might as well check out a bit more!</p>
            <ul class="footer-svg">
                <li> <a href=""><img src="images/instagram-svgrepo-com (1).svg" class="icon" alt="instagram logo"></a></li>
                <li> <a href="https://www.linkedin.com/in/cassidypelacek/"><img src="images/linkedin-161-svgrepo-com.svg" class="icon" alt="linkedin logo"></a></li>
                <li> <a href="https://github.com/casspb"><img src="images/github-svgrepo-com.svg" class="icon" alt="github logo"></a></li>
                <li>  <a href=""><img src="images/spotify-162-svgrepo-com.svg" class="icon" alt="spotify logo"></a></li>
            </ul>
        </div>
</footer>
</body>
</html>
