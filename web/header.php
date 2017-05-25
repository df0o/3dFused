<?php
session_start();  
?>

<!DOCTYPE HTML>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="4ww3 project blah blah" />
    <meta name="keywords" content="will,fill,later" />
    <meta name="author" content="Susie Yu" />
    <meta name="robots" content="index,follow" />
    <link rel="icon" href="icon.ico" /> <!-- icon for site -->
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js" ></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> <!-- google sans-serif font "Ubuntu" -->
    <title>3DFused - Turning Designs Into Objects</title>
  </head>

  <body>
    <div id="index-wrapper"> <!-- wrapper for body -->
      <header class="main-header"> 
        <div>
          <a class="main-logo" href="./index.php"> <!-- clicking on logo links back to main page -->
            <img class="site-logo" alt="3dFused logo" src="main_logo.png">
          </a>
        </div>

        <div class="nav"> <!--navagation in top bar -->
        <a href="#" id="menu-icon"></a>
          <ul>
            <li><a id="about-page" href="./test2.php">ABOUT</a></li> <!-- this page doesnt link to anything right now -->
            <?php
            if((isset($_SESSION['username']) != '')){
              echo '<li id="hiUser">Hi, '.$_SESSION["username"].'</li>
            <li><a id="logout-nav" href="./logout.php">Log out</a></li>';
            } else {
              echo '<li><a id="signup-nav" href="./registration.php">Sign up</a></li>
            <li><a id="login-nav" href="./registration.php">Log in</a></li>';
            }
            ?>
            <li><a id="start-print-nav" href="./search.php">3D Print</a></li>
          </ul>
        </div>
      </header>