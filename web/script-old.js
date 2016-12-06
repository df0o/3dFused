function formValidation() { //main validation fuction
	var ufirstn = document.registration.first_name; // variables from html files
	var ulastn = document.registration.last_name;
	var passid = document.registration.passid;
	var uname = document.registration.username;
  var idnumber = document.registration.idnumber;
  var bday = document.registration.bday;
	var uemail = document.registration.email;
	var term = document.registration.terms;
	var text; //text for displaying error message

	if (userfirstn_validation(ufirstn, 2, 12)) { // first name validation
		if (userlastn_validation(ulastn, 2, 12)) { // last name validation
			if (allLetter(uname)) { // user name validation
        if (allNum(idnumber)) { // id validation
          if (ValidateEmail(uemail)) { // email validation
            if (passid_validation(passid, 7, 12)) { // password validation
              if (checkTerms(term)) { // radio box validation
                document.getElementById("errorMsg").innerHTML = " yay! you did it! "; //message if all correct
              }
            }
          }
				}
			}
		}
	}
	return false; // something went wrong...
}

function userfirstn_validation(ufirstn, mx, my) { // check name field is not empty and also within length
	var ufirstn_len = ufirstn.value.length;
	if (ufirstn_len == 0 || ufirstn_len >= my || ufirstn_len < mx) {
		text = ("Please enter first name / length be between " + mx + " - " + my); // error messgage
		document.getElementById("errorMsg").innerHTML = text; // show error message
		return false;
	}
	return true;
}

function userlastn_validation(ulastn, mx, my) { // check name field is not empty and also within length
	var ulastn_len = ulastn.value.length;
	if (ulastn_len == 0 || ulastn_len >= my || ulastn_len < mx) {
		text = ("Please enter last name / length be between " + mx + " - " + my);
		document.getElementById("errorMsg").innerHTML = text;
		return false;
	}
	return true;
}

function passid_validation(passid, mx, my) {  // password cant be empty
	var passid_len = passid.value.length;
	if (passid_len == 0 || passid_len >= my || passid_len < mx) { // also need to be within length
		text = ("Please enter password / length be between " + mx + " - " + my);
		document.getElementById("errorMsg").innerHTML = text;
		return false;
	}
	return true;
}

function allLetter(uname) { // all leters for username
	var letters = /^[A-Za-z]+$/;
	if (uname.value.match(letters)) {
		return true;
	} else {
		text = ("Username must have alphabet characters only");
		document.getElementById("errorMsg").innerHTML = text;
		return false;
	}
	return true;
}

function allNum(idnumber) { // all numbers 
	if (idnumber.value.length == 0 || !Number.isNAN(idnumber)) { // cant be empty
		text = ("ID cannot be empty");
		document.getElementById("errorMsg").innerHTML = text;
		return false;
	}
  
  key = String.fromCharCode(idnumber);
	
  return true;
}

function ValidateEmail(uemail) { // email validation
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (uemail.value.match(mailformat)) {
		return true;
	} else {
		text = ("You have entered an invalid email address!");
		document.getElementById("errorMsg").innerHTML = text;
		return false;
	}
	return true;
}

function checkTerms(term) { //need to select terms
	if (term.checked == false) {
		text = ("You must agree to the terms first.");
		document.getElementById("errorMsg").innerHTML = text;
		return false;
	} else {
		return true;
	}
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
