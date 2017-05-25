<?php include "./header.php";?>
      
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOvImrAkQGn0o68ZD6voiz6l5Kon4QRV4" type="text/javascript"></script>
  
  <article id="search-article">
    <section id="searchmain">
    
      <h2 id="search-title">Search for 3D Printers Near You!</h2><br>
      <form> <!-- this doesnt submit to anything yet -->
        <input class="form-input" id="search-location" type="search" name="search-location" placeholder="Enter Location"> <br> <!-- search by location to find printers near you -->
        
        <button class="form-input" id="getlocabutt" type="button" onclick="locateMeClick();">Locate Me</button><br>
        <select class="form-input" id="search-rating">
          <option selected disabled>Select User Rating</option> <!-- sort by xx raiting or higher -->
          <option value="fiveS">5 Stars</option>
          <option value="fourS">4+ Stars</option>
          <option value="threeS">3+ Stars</option>
          <option value="twoS">2+ Stars</option>
          <option value="oneS">1+ Stars</option>
        </select> <br><br>
        <p id="selectMaterial">Select Printing Material: </p> <!-- check list of popular printer materials -->
        <input class="form-input" id="pla-checkbox" type="checkbox" name="materials-pla" value="materials-pla"> <label for="pla-checkbox">PLA</label>
        <input class="form-input" id="abs-checkbox" type="checkbox" name="materials-abs" value="materials-abs"> <label for="abs-checkbox">ABS</label>
        <input class="form-input" id="petg-checkbox" type="checkbox" name="materials-petg" value="materials-petg"> <label for="petg-checkbox">PETG</label> <br>
        <input class="form-input" id="nylon-checkbox" type="checkbox" name="materials-nylon" value="materials-nylon"> <label for="nylon-checkbox">Nylon</label>
        <input class="form-input" id="tpe-checkbox" type="checkbox" name="materials-tpe" value="materials-tpe"> <label for="tpe-checkbox">TPE/TPU</label>
        <input class="form-input" id="pva-checkbox" type="checkbox" name="materials-pva" value="materials-pva"> <label for="pva-checkbox">PVA</label> <br>
        <input class="form-input" id="pet-checkbox" type="checkbox" name="materials-pet" value="materials-pet"> <label for="pet-checkbox">PET</label>
        <input class="form-input" id="carbon-checkbox" type="checkbox" name="materials-carbon" value="materials-carbon"> <label for="carbon-checkbox">Carbon Fiber</label>
        <input class="form-input" id="pc-checkbox" type="checkbox" name="materials-pc" value="materials-pc"> <label for="pc-checkbox">PC/Polycarbonate</label> <br>
        <input class="form-input" id="search-submit" type="submit" value="Submit"> <br>
        <a id="tempLink" href="./results_sample.php">temporary link to result page</a> <!-- a temp link if you want to click into the hard coded result page -->
      </form>
    </section>
  </article>
      
<?php include "./footer.php";?>