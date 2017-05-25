<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', '3dfused_db');
define('DB_USER', '3dfused');
define('DB_PASS', 'lamabatterynexus');

$conn = new PDO("mysql:host=localhost:3306;dbname=3dfused_db", "3dfused", "lamabatterynexus");

function verifyDate($bday)
{
	$errors = DateTime::getLastErrors();
	if (!empty($errors['warning_count'])) {
    	echo "Invalid date or format\n";
    	return FALSE;
	} else {return TRUE;}	
}

function NewUser()
{
	global $conn;
	$username = $_POST['username'];
	$password = $_POST['passid'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$age = $_POST['age'];
	$bday = $_POST['BirthDay'];

	// $bdayday = DateTime::createFromFormat('Y/m/d', $bday);
 	print_r($bdayday);
	$cost = 10;
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	$salt = sprintf("$2a$%02d$", $cost).$salt;
	$passhash = crypt($password, $salt);

	try{
	$stmt = $conn->prepare("INSERT INTO User (username, passhash, email, name, age, bday) VALUES (:username,:passhash,:email,:name,:age,:bday)");
	$stmt->bindValue(':name', $name);
	$stmt->bindParam(':passhash', $passhash);
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':age', $age);
	$stmt->bindParam(':bday', $bday);
    if ($stmt->execute()){
      header("Location: https://3dfused.tech/reg_thanks.php");
      exit;
    }
    
	} catch (PDOException $e) {echo $e->getMessage();}
          catch (Exception $e) {echo $e->getMessage();}


// 	if($conn->query($sql))
// 	{
// 	  echo "YOUR REGISTRATION IS COMPLETED...";
// 	} else {echo "failed";}
}

function SignUp()
{
if(!empty($_POST['username']))   // check if the username field is empty
{
	global $conn;
	try{
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("SELECT * FROM User WHERE username = '$_POST[username]'");
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$result = $stmt->fetchAll();
		if(!$result)
		{
			NewUser();
		}
		else
		{
			echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
		}
	} 
	catch(PDOException $e)
  	{
  		echo $e->getMessage();
  	}
}
}

if(isset($_POST['submit']))
{
	SignUp();

}
?>
