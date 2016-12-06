var strFields = "";


function signupValidation() {
  var missingFields = false;
  var div = document.getElementById("errorbox");
  
  if (!validateUsername()){
    missingFields = true;
  }
  if (!validateName()) {
    missingFields = true;
  }
  if (!validatePassword()) {
    missingFields = true;
  }
  if (!validateEmail()) {
    missingFields = true;
  }
  if (!validateAge()) {
    missingFields = true;
  }
  if (!validateBDay()) {
    missingFields = true;
  }
  if (!checkTerms()) {
    missingFields = true;
  }

  if (missingFields) {
    div.style.display = "block";
    document.getElementById("errorMsg").innerHTML = ("Please correct the following error(s) before continuing:<br><br>" + strFields );
    strFields = "";
		return false;
  }
  return true;
}

function loginValidation() {
  var missingFields = false;
  var div = document.getElementById("errorbox");
  
  if (!validateUsername()){
    missingFields = true;
  }
  if (!validatePassword()) {
    missingFields = true;
  }
  if (missingFields) {
    div.style.display = "block";
    document.getElementById("errorMsg").innerHTML = ("I'm sorry, but you must correct the following error(s) before continuing:<br><br>" + strFields );
    strFields = "";
		return false;
  }
  return true;
}

function validateUsername() {
    // Get value entered into Username text field
    var checkVal = document.registration.username.value;

    // User Name not empty
    if (checkVal.length == 0) {
      strFields += "- Username cannot be empty!<br>";
      return false;
    }

    // User Name alphanumeric (case-insensitive)
    if (!(/^[a-z0-9]+$/i.test(checkVal))) {
        strFields += "- Username must be alphanumeric!<br>";
        return false;
    }

    // User Name length: 6-20 (inclusive)
    if (checkVal.length < 6 || checkVal.length > 20) {
        strFields += "- Username must be at least 6 and 20 characters long characters long!<br>";
        return false;
    }
    return true;
}

function validateName() {
    var checkVal = document.registration.name.value;

    // First name not empty
    if (checkVal.length == 0) {
        strFields += "- Name cannot be empty!<br>";
        return false;
    }

    // First Name under 30 characters
    if (checkVal.length > 30) {
        strFields += "- Name cannot be over 30 characters long!<br>";
        return false;
    }

    // First Name letters only (case-insensitive)
    if (!(/^[a-z]+$/i.test(checkVal))) {
        strFields += "- Name Must be alphabetic!<br>";
        return false;
    }
    return true;
}

// Validate Password field. Return true if it passes all tests, else false
function validatePassword() {
    var checkVal = document.registration.passid.value;

    // Password not empty
    if (checkVal.length == 0) {
        strFields += "- Password cannot be empty!<br>";
        return false;
    }

    // Password length: 6-20 (inclusive)
    if (checkVal.length < 6 || checkVal.length > 20) {
        strFields += "- Password must be between 6 and 20 characters long!<br>";
        return false;
    }

    return true;
}

function validateEmail() {
    var checkVal = document.registration.email.value;

    // Email not empty
    if (checkVal.length == 0) {
        strFields += "- Email cannot be empty!<br>";
        return false;
    }

    if (!(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/.test(checkVal))) {
        strFields += "- Invalid Email format!<br>";
        return false
    }

    return true;
}

function validateAge() {
    var checkVal = document.registration.age.value;

    // Age not empty
    if (checkVal.length == 0) {
        strFields += "- Age cannot be empty!<br>";
        return false;
    }

    // Age is 10-120
    if (checkVal < 10 || checkVal > 120) {
        strFields += "- Invalid age!<br>";
        return false;
    }

    // Age is numeric characters only
    if (!(/^[0-9]+$/.test(checkVal))) {
        strFields += "- Age must be numeric!<br>";
        return false;
    }

    return true;
}

function validateBDay() {
    var checkVal = document.registration.BirthDay.value;

    // Birth Day not empty
    if (checkVal == "") {
        strFields += "- Birth Date cannot be empty!<br>";
        return false;
    }

    // Find text matching digit format "dd/mm/yyyy"
    dateMatches = checkVal.match(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/);

    // Date entered using format
    if (dateMatches == null) {
        strFields += "- Invalid date format (dd/mm/yyyy)!<br>";
    }

    // Birth Day day must be 1-31 (inclusive)
    if (dateMatches[1] < 1 || dateMatches[1] > 31) {
        strFields += "- Day must between 1 and 31!<br>";
        return false;
    }

    // Birth Day month must be 1-12 (inclusive)
    if (dateMatches[2] < 1 || dateMatches[2] > 12) {
        strFields += "- Month must be between 1 and 12!<br>";
        return false;
    }

    // Birth Day year must be 1900-2016 (inclusive)
    if (dateMatches[3] < 1900 || dateMatches[3] > 2016) {
        strFields += "- Year must be between 1900 and 2016!<br>";
        return false;
    }

    return true;
}

function checkTerms() { //need to select terms
  var checkVal = document.registration.terms;
	if (checkVal.checked == false) {
		strFields += "- You must agree to the terms!";
		return false;
	}
  return true;
}

function hideError() {
  var div = document.getElementById("errorbox");
  div.style.display = "none";
}

// Get the location of the user
function getLocation() {
    // Check if location service is allowed
    if (navigator.geolocation) {
        // Get the location and call function to fill the inputs
        navigator.geolocation.getCurrentPosition(fillPosition);
    } else {
        // Geolocation fail error
        document.getElementById('search-form').insertAdjacentHTML('afterend', '<div><p>Geolocation failed</p></div>');
    }
}

// Fill latitude and longitude with the passed geolocation information
function fillPosition(pos) {
    document.getElementById("sub-lat").value = pos.coords.latitude;
    document.getElementById("sub-lon").value = pos.coords.longitude;
}

function initMap() { // google map api
  var locations = [ // multiple locations/markers
      ['content', 43.2605738, -79.9304626, 4], //content can be changed to display different things
      ['content', 43.2805738, -79.9504626, 5],
      ['content', 43.2005738, -79.9004626, 3],
      ['content', 43.3005738, -79.9204626, 2],
      ['content', 43.2505738, -79.8804626, 1]
    ];
  
  var mapOptions = { // map options 
    zoom: 11,
    center: new google.maps.LatLng(43.2605738, -79.9304626),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  
  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
  var infowindow = new google.maps.InfoWindow(); // info window for markers
  var marker, i;
  
  var contentString = '<div id="content">'+ // content in info window
    '<h1 id="firstHeading" class="firstHeading">MakerBot Replicator Desktop 3D Printer</h1>'+
    '<p>The replicator desktop model provides a large build volume and fast print time to accelerate rapid prototyping and model making.</p>'+
    '<p>MakerBot: , <a href="./individual_sample.html">'+
    'Click here to go to posting</a> '+
    '</div>';
  
  for (i = 0; i < locations.length; i++) { // display all markers
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) { // show info window when click marker
      return function() {
        infowindow.setContent(contentString); //locations[i][0]
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
}



var geocoder;

//Get the latitude and the longitude;
function successFunction(position) {
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  codeLatLng(lat, lng)
}

function errorFunction(){
  alert("Geocoder failed");
}

function locateMe() {
  geocoder = new google.maps.Geocoder();
  
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
  } 
}

function codeLatLng(lat, lng) {
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
      if (results[1]) {
        for (var i = 0; i < results[0].address_components.length; i++) {
          for (var b = 0;b < results[0].address_components[i].types.length; b++) {

            if (results[0].address_components[i].types[b] == "locality") {
              //this is the object you are looking for
              city = results[0].address_components[i];
              fillLoca(city.long_name);
              break;
            }
          }
        }
      } else {
        alert("No results found");
      }
    } else {
      alert("Geocoder failed due to: " + status);
    }
  });
}

function fillLoca(city) {
    document.getElementById("search-location").value = city;
}


function openModal() {
  var modal = document.getElementById('myModal');
  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById('myModal');
  var span = document.getElementsByClassName("close")[0];
  modal.style.display = "none";
}



