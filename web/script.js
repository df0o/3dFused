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
    if (checkVal.length < 10 || checkVal.length > 120) {
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
