<!DOCTYPE html>
<html lang="en">

<?php

require_once('includes/connect.php');

$query = 'SELECT project.id AS project, name, year FROM project';

$results = mysqli_query($connect, $query);

?>

<head>
    <meta charset="UTF-8">
    <!-- in mobile set initial zoom level of page to 100%, set site size to equal device width not a larger canvas that is shrunk down-->
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title class="hidden">Cassidy Pelacek Portfolio</title>
    <!-- Link to reset or normalize before main.css
    only choose one -->
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/grid.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>

<body>
 <header>
   
    <a href="index.html" class="logo"><img src="images/cassID-logo.svg" alt="cass ID logo"> </a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar"><img src="images/green-star.svg" class="menu-star"> </label>

    <nav class="navbar">
        <ul>
            <li><a href="#">contact <img src="images/cassID-star.svg" class="link-star"></a> </li>
            <li><a href="project.html">works<img src="images/cassID-star.svg" class="link-star"> </a></li>
            <li><a href="#">about me<img src="images/cassID-star.svg" class="link-star"></a> </li>
            <li><a href="#">testimonials<img src="images/cassID-star.svg" class="link-star"></a> </li>

        </ul>
    </nav>

</header>

    

    <main >
        
        <section class="header-image grid-con col-span-full">
            <h1 class="hidden">header image</h1>
        <img src="images/cassID-card.svg" alt="placeholder for ID card" class="id-card col-span-full">
         </section>

         <section class="about-me-section col-span-full">
            <h1> Hello I'm Cassidy</h1>
            <p>Welcome to my corner of creativity, and a place to dive into a new adventure- like finding that elusive ID card tucked away in the depths of your wallet!</p>
 
            <p> Over the years, Ive been on a journey to discover my own identity, or as I like to call it, my “CassID.”</p>
         </section>

         <section class="project-video-section col-span-full">
            <h1 class="hidden">Project Roundup Video</h1>
            <div id="player-container">
                <video controls preload="metadata" poster="images/scrapbook-cover-collage.png">
                    <source src="video/tester-vid.MOV" type="video/mp4">
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
        

        <!--section where if u click on a button it will sort a project based on the type of project it was-->
        <div class="project-works-section grid-con">
            <div class="col-span-full">
                <h1 class="col-span-full">Works</h1>
        
                <div class="sorting-buttons-container">
                    <div class="sorting-buttons"><p>DESIGN</p></div>
                    <div class="sorting-buttons"><p>MOTION</p></div>
                    <div class="sorting-buttons"><p>DEVELOPMENT</p></div>
                </div>
            </div>
        </div>
        

            <!--section for dynamically displaying the projects-->
     
    

           <div class="grid-con">
    <?php
     while($row = mysqli_fetch_array($results)) {
        echo '
        <div class="project-card col-span-4">
        <h2>'.$row['name'].'</h2>
        <p>Little bit of info - '.$row['year'].'</p>
        <div class="sorting-buttons-variation">
            <p>DESIGN</p>
        </div>
        <div class="arrow">
            <a href="project.html">
                <img src="images/arrow-up-right.svg" alt="Arrow Icon">
            </a>
        </div>
    </div>';

    }?>


    </main>
    <footer>

        <div class="thank-you">
        <h1 class="col-span-full">THANK YOU</h1>
        <h2 class="col-span-full">TESTIMONIAL</h2>
    </div>

        <section class="testimonial-section  grid-con">
            <h1 class="hidden"> testimonials</h1>
    
            <div class="testimonial  col-span-full m-col-span-4">
                <h3>Allen Gaynor, Web Facilitator, FSU</h3>
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
                    Multi-talented: able to handle roles of photographer, on-screen representative, and video editor, and programming, as indicated by working on a Jeopardy game. Does a great job in all of those roles. Meets deadlines, in most cases in far less time than I expect, and organized.
                </p>
            
            </div>

            <div class="testimonial col-span-4  m-col-span-4">
                <h3>Allen Gaynor, Web Facilitator, FSU</h3>
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
                    Multi-talented: able to handle roles of photographer, on-screen representative, and video editor, and programming, as indicated by working on a Jeopardy game. Does a great job in all of those roles. Meets deadlines, in most cases in far less time than I expect, and organized.
                </p>
            
            </div>

            <div class="testimonial col-span-4  m-col-span-4">
                <h3>Allen Gaynor, Web Facilitator, FSU</h3>
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
                    Multi-talented: able to handle roles of photographer, on-screen representative, and video editor, and programming, as indicated by working on a Jeopardy game. Does a great job in all of those roles. Meets deadlines, in most cases in far less time than I expect, and organized.
                </p>
            
            </div>
            

         </section>

         <div class="star-divider">
            <img src="images/green-star.svg" alt="green-star">
            <img src="images/green-star.svg" alt="green-star">
            <img src="images/green-star.svg" alt="green-star">
         </div>

         <section class="contact">
            <h1>CONTACT</h1>
            <h2>TIME TO REACH OUT?</h2>
        
            <!-- Section for contact form -->
            <form method="POST" action="send_mail.php" class="contact-form grid-con">
                <div class="col-span-full l-col-start-2 l-col-span-1">
                    <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
                </div>
                <div class="col-span-full l-col-span-1">
                    <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
                </div>
                <div class="col-span-full l-col-start-2 l-col-span-2 ">
                    <input type="email" id="email" name="email" placeholder="sayhello@gmail.com" required>
                </div>
                <div class="col-span-full l-col-start-2 l-col-span-2 ">
                    <textarea id="message" name="message" placeholder="lets talk about the piece of ID you are missing!" rows="4" required></textarea>
                </div>
                <div class="col-start-3 col-span-2 l-col-end-3">
                    <button type="submit">SEND</button>
                </div>
            </form>
        </section>

        <div class="bottom-footer">
            <p>wow! made it all the way here! <br>
                might as well check out a bit more!</p>

            <ul class="footer-svg">
               <li> <a href=""><img src="images/instagram-svgrepo-com (1).svg" alt="instagram logo"></a></li>
               <li> <a href="" ><img src="images/linkedin-161-svgrepo-com.svg" alt="linkedin logo"></a></li>
               <li> <a href="" ><img src="images/github-svgrepo-com.svg" alt="github logo"></a></li>
               <li>  <a href="" ><img src="images/spotify-162-svgrepo-com.svg" alt="spotify logo"></a></li>
            </ul>
        </div>

    </footer>
    <script src="js/main.js"></script>
</body>

</html>