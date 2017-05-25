<?php include "./header.php";?>
      
<article id="result-article"> <!-- hard coded search results -->
<section id="resultsmain">

  <div class="table-view"> <!-- table of object details -->
  <br><br><h2 id="itemTitle">Cheap print!! come check it out :D</h2>
    <table class="result-table">
      <tr>
        <td rowspan="3"><img class="printerPicture" alt="picture of 3d printer" src="printerSample.png"></td> <!-- image of object that spans 2 rows -->
        <td>Printer type: <br> <!-- description of object -->
        <p class="sample-description-text">MakerBot Replicator Desktop 3D Printer<p>
        </td> 
      </tr>
      <tr>
        <td>seller: <br> <!-- listed price -->
        <p class="sample-description-text">username</p>
        </td> 
      </tr>
      <tr>
        <td>Price: <br> <!-- listed price -->
        <p class="sample-description-text">the price will be based on per amount of filiment used for the print</p>
        </td> 
      </tr>
      <tr>
        <td colspan="2">
        Description: <br>
        <p class="sample-description-text">The fifth generation replicator features WiFi enabled software connected with Makerbot mobile apps alongside Makerbot desktop apps. The replicator desktop model provides a large build volume and fast print time to accelerate rapid prototyping and model making.<p>
        </td>
      </tr>
    </table>
    
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIEqNwyeMt5ow6iRiI3t9Mk0RXBo-S-FQ&callback=initMap"
    async defer>
    </script>

    <table class="result-table" id="bottom-table">
      <tr>
        <th colspan="2">Customer Reviews</th> <!-- sample reviews -->
      </tr>
      <tr>
        <td><img class="raiting-stars" alt="picture of star raitings" src="stars.png"></td>
        <td class="sample-description-text">this is a review. the print was great. printer owner was nice. price was good</td>
      </tr>
      <tr>
        <td><img class="raiting-stars" alt="picture of star raitings" src="stars.png"></td>
        <td class="sample-description-text">this is another review. woot!</td>
      </tr>
    </table>
    
    <!-- open modal -->
    <?php
        if((isset($_SESSION['username']) != '')){
          echo '<button class="form-input" id="openReviewMod" type="button" onclick="openModal();">Write an Review</button><br>';
        }
        ?>

    <!-- the modal -->
    <div id="myModal" class="modal">

      <!-- modal content -->
      <div class="modal-content">
        
        <img id="closeMod" alt="image of close button" onclick="closeModal();" src="close_button.png">
        
        <div class="starRating">
          <input type="hidden" id="rating5_hidden" value="5">
          <img src="star1.png" onmouseover="change(this.id);" id="rating5" class="rating">
          <input type="hidden" id="rating4_hidden" value="4">
          <img src="star1.png" onmouseover="change(this.id);" id="rating4" class="rating">
          <input type="hidden" id="rating3_hidden" value="3">
          <img src="star1.png" onmouseover="change(this.id);" id="rating3" class="rating">
          <input type="hidden" id="rating2_hidden" value="2">
          <img src="star1.png" onmouseover="change(this.id);" id="rating2" class="rating">
          <input type="hidden" id="rating1_hidden" value="1">
          <img src="star1.png" onmouseover="change(this.id);" id="rating1" class="rating">
        </div>
        
        <form id="review-form" name='userReview' action="submit-review.php" method="post">
          <textarea class="form-input" id="formtext" name="message" placeholder="Write an review"></textarea>
          <input type="hidden" name="starrating" id="starrating" value="0">
          <input class="form-input" id="submitReview" onclick="closeModal();" type="submit" value="Submit Review" name="submit_rating">
        </form>
      </div>
    </div>
  </div>
</section>
</article>
      
<?php include "./footer.php";?>