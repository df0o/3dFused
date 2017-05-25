<?php include "./header.php";?>
      
<div id="result-div"> 
    <div id="map-div">
      <div id="map"></div>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIEqNwyeMt5ow6iRiI3t9Mk0RXBo-S-FQ&callback=initMap"
        async defer>
        </script>
    </div>

    <aside id="sidebar">
      <p id="search-filter-title">Search Result Filter</p>
      <form>
      <section class="widget" id="widget_1">
        <p id="selectMaterial">Printing Materials: </p> <!-- check list of popular printer materials -->
        <input class="side-input" id="pla-checkbox" type="checkbox" name="materials-pla" value="materials-pla"> <label for="pla-checkbox" class="side-text">PLA</label><br>
        <input class="side-input" id="abs-checkbox" type="checkbox" name="materials-abs" value="materials-abs"> <label for="abs-checkbox" class="side-text">ABS</label><br>
        <input class="side-input" id="petg-checkbox" type="checkbox" name="materials-petg" value="materials-petg"> <label for="petg-checkbox" class="side-text">PETG</label> <br>
        <input class="side-input" id="nylon-checkbox" type="checkbox" name="materials-nylon" value="materials-nylon"> <label for="nylon-checkbox" class="side-text">Nylon</label><br>
        <input class="side-input" id="tpe-checkbox" type="checkbox" name="materials-tpe" value="materials-tpe"> <label for="tpe-checkbox" class="side-text">TPE/TPU</label><br>
        <input class="side-input" id="pva-checkbox" type="checkbox" name="materials-pva" value="materials-pva"> <label for="pva-checkbox" class="side-text">PVA</label> <br>
        <input class="side-input" id="pet-checkbox" type="checkbox" name="materials-pet" value="materials-pet"> <label for="pet-checkbox" class="side-text">PET</label><br>
        <input class="side-input" id="carbon-checkbox" type="checkbox" name="materials-carbon" value="materials-carbon"> <label for="carbon-checkbox" class="side-text">Carbon Fiber</label><br>
        <input class="side-input" id="pc-checkbox" type="checkbox" name="materials-pc" value="materials-pc"> <label for="pc-checkbox" class="side-text">PC/Polycarbonate</label> <br>
      </section>
      
      <section class="widget" id="widget_2">
        <p id="selectPrice">Price Rage: </p>
        <div id="price-search-text">
        from $ <input class="side-price-input" type="search" name="min-price"> to $ <input class="side-price-input" type="search" name="max-price">
        </div>
      </section>
      
      <section class="widget" id="widget_3">
        <p id="selectLoca">Item Location: </p>
        
      </section>
      
      <input class="side-input" id="sidebar-submit" type="submit" value="Apply"> <br>
      
      </form>
    </aside>


    <article id="result-main">
      <table class="result-table">
      
        <tr>
          <td class="result-info" id="result-image" width="20%">
            <a href="./individual_sample.php"><img class="printerPicture" alt="picture of 3d printer" src="printerSample.png"></a>
          </td>
          <td class="result-info" width="65%">
            <a href="./individual_sample.php" class="result-link-text">MakerBot Replicator Desktop 3D Printer</a> <br>
            
            <a href="./individual_sample.php" class="result-userId">Username of seller</a> <br><br>
            
            <p class="result-descrip-text">The fifth generation replicator features WiFi enabled software connected with Makerbot mobile apps alongside Makerbot desktop apps.</p>
            
          </td>
          <td class="result-info" id="result-price" width="15%">
            <p class="resilt-buy-title">Buy Price</p>
            <p class="result-price-text">$10 / feet</p>
          </td>
        </tr>

        
        <tr>
          <td class="result-info" id="result-image" width="20%">
            <a href="./individual_sample.php"><img class="printerPicture" alt="picture of 3d printer" src="printerSample.png"></a>
          </td>
          <td class="result-info" width="65%">
            <a href="./individual_sample.php" class="result-link-text">MakerBot Replicator Desktop 3D Printer</a> <br>
            
            <a href="./individual_sample.php" class="result-userId">Username of seller</a> <br><br>
            
            <p class="result-descrip-text">The fifth generation replicator features WiFi enabled software connected with Makerbot mobile apps alongside Makerbot desktop apps.</p>
            
          </td>
          <td class="result-info" id="result-price" width="15%">
            <p class="resilt-buy-title">Buy Price</p>
            <p class="result-price-text">$10 / feet</p>
          </td>
        </tr>
        
        <tr>
          <td class="result-info" id="result-image" width="20%">
            <a href="./individual_sample.php"><img class="printerPicture" alt="picture of 3d printer" src="printerSample.png"></a>
          </td>
          <td class="result-info" width="65%">
            <a href="./individual_sample.php" class="result-link-text">MakerBot Replicator Desktop 3D Printer</a> <br>
            
            <a href="./individual_sample.php" class="result-userId">Username of seller</a> <br><br>
            
            <p class="result-descrip-text">The fifth generation replicator features WiFi enabled software connected with Makerbot mobile apps alongside Makerbot desktop apps.</p>
            
          </td>
          <td class="result-info" id="result-price" width="15%">
            <p class="resilt-buy-title">Buy Price</p>
            <p class="result-price-text">$10 / feet</p>
          </td>
        </tr>
        
        <tr>
          <td class="result-info" id="result-image" width="20%">
            <a href="./individual_sample.php"><img class="printerPicture" alt="picture of 3d printer" src="printerSample.png"></a>
          </td>
          <td class="result-info" width="65%">
            <a href="./individual_sample.php" class="result-link-text">MakerBot Replicator Desktop 3D Printer</a> <br>
            
            <a href="./individual_sample.php" class="result-userId">Username of seller</a> <br><br>
            
            <p class="result-descrip-text">The fifth generation replicator features WiFi enabled software connected with Makerbot mobile apps alongside Makerbot desktop apps.</p>
            
          </td>
          <td class="result-info" id="result-price" width="15%">
            <p class="resilt-buy-title">Buy Price</p>
            <p class="result-price-text">$10 / feet</p>
          </td>
        </tr>
        
        <tr>
          <td class="result-info" id="result-image" width="20%">
            <a href="./individual_sample.php"><img class="printerPicture" alt="picture of 3d printer" src="printerSample.png"></a>
          </td>
          <td class="result-info" width="65%">
            <a href="./individual_sample.php" class="result-link-text">MakerBot Replicator Desktop 3D Printer</a> <br>
            
            <a href="./individual_sample.php" class="result-userId">Username of seller</a> <br><br>
            
            <p class="result-descrip-text">The fifth generation replicator features WiFi enabled software connected with Makerbot mobile apps alongside Makerbot desktop apps.</p>
            
          </td>
          <td class="result-info" id="result-price" width="15%">
            <p class="resilt-buy-title">Buy Price</p>
            <p class="result-price-text">$10 / feet</p>
          </td>
        </tr>
        
        
      </table>

    </article>

</div>
      
<?php include "./footer.php";?>