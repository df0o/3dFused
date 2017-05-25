<?php

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket="3dfused-store";

//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAI3Y4EO54KEPSPJBA');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');


/*
define('DB_HOST', '127.0.0.1');
define('DB_NAME', '3dfused_db');
define('DB_USER', '3dfused');
define('DB_PASS', 'lamabatterynexus');

$conn = new PDO("mysql:host=localhost:3306;dbname=3dfused_db", "3dfused", "lamabatterynexus");
*/
function Submit()
{
	// validate stuff


	// Set Amazon s3 credentials
	$client = S3Client::factory(
	  array(
	    'credentials' => array(
	      'key' => awsAccessKey,
	      'secret' => awsSecretKey
	    ),
	    'region' => 'us-east-1',
	    'version' => 'latest'
	  )
	);

	include('image_validation.php');
	$message='';
	$name = $_FILES['file']['name'];
	$size = $_FILES['file']['size'];
	$tmp = $_FILES['file']['tmp_name'];
	$ext = getExtension($name);
	if(strlen($name) > 0)
	{
		// File format validation
		if(in_array($ext,$valid_formats))
	{
		// File size validation
		if($size<(1024*1024))
	{
	//Rename image name.
	$image_name_actual = time()."_".$name;
	try 
	{
		$client->putObject(array(
	             'Bucket'=>$bucket,
	             'Key' =>  $image_name_actual,
	             'SourceFile' => $tmp,
	             'StorageClass' => 'REDUCED_REDUNDANCY'
	        ));

	$bucketurl="https://".$bucket.".s3.amazonaws.com/";
	$s3file = $bucketurl.$image_name_actual;
	echo "<img src='$s3file'/>";
	echo "<br/>";
	echo 'S3 File URL:'.$s3file;
	 
	} catch (S3Exception $e) {
	        // Catch an S3 specific exception.
	        echo $e->getMessage();
	}
	}
	else
	$message = "Image size Max 1 MB";
	 
	}
	else
	$message = "Invalid file, please upload image file.";
	 
	}
	else
	$message = "Please select image file.";

	

	/*
	$title = $_POST['sub-title'];
	$description = $_POST['sub-description'];
	$printer = $_POST['sub-printerType'];
	$website = $_POST['website'];
	$lat = $_POST['sub-lat'];
	$lon = $_POST['sub-lon'];

	global $conn;
	try
	{
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("INSERT INTO Post (title, content, printer, lat, lon, website) VALUES (:title,:description,:printer,:lat,:lon,:website)");
		$stmt->bindParam(':title', $title);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':printer', $printer);
		$stmt->bindParam(':lat', $lat);
		$stmt->bindParam(':lon', $lon);
		$stmt->bindParam(':website', $website);
	    if ($stmt->execute()){
	      header("Location: https://3dfused.tech/reg_thanks.php");
	      exit;
	    } 
	} 
	catch (PDOException $e) {echo $e->getMessage();}
	catch (Exception $e) {echo $e->getMessage();}
	if(!$result)
	{
		NewUser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	} 
	*/
}

if(isset($_POST['submit']))
{
	Submit();
}
?>
