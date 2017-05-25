<?php include "./header.php";?>

  <div id="main-content">
    <div id="overlay-text"> <!-- text over video background -->
      <h1 id="title-text">Turning designs into objects</h1>
      <p id="description-text">Lorem ipsum dolor sit amet, lorem nunc sed sollicitudin acss.</p>
      <button id="startnow-button" onClick="location.href='./search.php'">3D Print Now!</button>
      <a id="howitworks-text" href="#hiw-content">See how it works</a> <!-- jump to how it work at bottom of page -->
    </div>
    
    <div id="videobg-div"> <!-- video background for landing page -->
      <video loop muted autoplay id="video-bg" poster="bg_still.jpg">
        <source src="bg.mp4" type="video/mp4">
      </video>
    </div>
    
    <div id="registerprinter-bar"> <!-- people with printers can contrubite to prints -->
      <?php
        if((isset($_SESSION['username']) != '')){
          echo '<a class="joinnetwork-text" id="listPrinter" href="./submission.php">List your printer!</a>';
        } else {
          echo '<a class="joinnetwork-text" id="joinPrinter" href="./registration.php">Own a printer? Join the network!</a>';
        }
        ?>
    </div>
    
    <article id="mainpage-article">
      <section id="quickintro-text">
        <h3 id="designintro-title">Designs into Objects</h3> <!-- a short into to what the site is suppose to do -->
        <p id="designintro-text">Lorem ipsum dolor sit amet, lorem nunc sed sollicitudin ac, metus arcu. Maecenas lorem pharetra. Eu platea vestibulum, nullam viverra metus donec in, amet vehicula auctor semper, elementum diam, pretium sit velit elit ornare amet.</p>
      </section>
      
      <section id="hiw-content">
        <h2 id="hiw-title">How it Works</h2>
        <h2 class="howitworks-subtitle" id="hiw-sub-print">Print your designs</h2>
        <!-- <h2 class="howitworks-subtitle" id="howitworks-sub-earn">Help print and earn</h2> -->
        <div class="howitworks-exp" id="hiw-exp-print">
          <table class="howitworks-table" id="hiw-printTable">
            <tr id="hiw-tableTitle">
              <th>1. Search</th>
              <th>2. Upload</th>
              <th>3. Print</th>
            </tr>
            <tr> <!-- sample pictures for how tos. they're all the same right now. will change once i find better pictures -->
              <th><img class="search-icon" alt="picture of search icon" src="search_icon.png"></th>
              <th><img class="search-icon" alt="picture of search icon" src="search_icon.png"></th>
              <th><img class="search-icon" alt="picture of search icon" src="search_icon.png"></th>
            </tr>
            <tr id="hiw-TableDesp">
              <th>Lorem ipsum dolor sit amet, lorem nunc sed sollicitudin acss.</th>
              <th>Lorem ipsum dolor sit amet, lorem nunc sed sollicitudin acss.</th>
              <th>Lorem ipsum dolor sit amet, lorem nunc sed sollicitudin acss.</th>
            </tr>
          </table>
        </div>
        <!-- this whole section is commented out because at first i wanted to do 2 tables, one for buying 3d prints, and one for how to offer prints. <p class="howitworks-exp" id="howitworks-exp-earn">Lorem ipsum dolor sit amet, lorem nunc sed sollicitudin ac, metus arcu. Maecenas lorem pharetra. Eu platea vestibulum, nullam viverra metus donec in, amet vehicula auctor semper, elementum diam, pretium sit velit elit ornare amet.</p> -->
      </section>
    </article>
  </div>
      
<?php include "./footer.php";?>