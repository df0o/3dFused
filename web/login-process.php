<?php
session_start();

define('DB_HOST', '127.0.0.1');
define('DB_NAME', '3dfused_db');
define('DB_USER', '3dfused');
define('DB_PASS', 'lamabatterynexus');

$conn = new PDO("mysql:host=localhost:3306;dbname=3dfused_db", "3dfused", "lamabatterynexus");

function Login()
{
if(!empty($_POST['username']))   // check if the username field is empty
{
	global $conn;
	try{
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$username = $_POST['username'];
		$password = $_POST['passid'];
		$stmt = $conn->prepare("SELECT passhash FROM User WHERE username = :username");
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		$result = $stmt->fetchAll();
		if(!$result)
		{
			echo "Username not in database";
		}
		else
		{ 
			$hash = $result[0]['passhash'];
			print_r($hash);
			echo '<br/>';
			print_r(crypt($password, $hash));
			echo '<br/>';
			if (hash_equals($hash, crypt($password, $hash))){
				echo "equals";
				$_SESSION['username'] = $username;
				header("location: index.php");
			} else {echo "doesnt equals";}

			
		}
	} 
	catch(PDOException $e)
  	{
  		echo $e->getMessage();
  	}
}
}
Login();
?>
