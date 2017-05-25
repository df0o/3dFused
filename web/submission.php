  <?php 
  include "./header.php";
  if(!isset($_SESSION['username']))
  {
    header('Location: index.php');
  }


require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$bucket="3dfused-store";

//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAI3Y4EO54KEPSPJBA');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');

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

include('verifyExtension.php');
$message='';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
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
 try {
        $client->putObject(array(
             'Bucket'=>$bucket,
             'Key' =>  $image_name_actual,
             'SourceFile' => $tmp,
             'StorageClass' => 'REDUCED_REDUNDANCY'
        ));

$bucketurl="https://".$bucket.".s3.amazonaws.com/";
$s3file = $bucketurl.$image_name_actual;

 
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


define('DB_HOST', '127.0.0.1');
define('DB_NAME', '3dfused_db');
define('DB_USER', '3dfused');
define('DB_PASS', 'lamabatterynexus');

$conn = new PDO("mysql:host=localhost:3306;dbname=3dfused_db", "3dfused", "lamabatterynexus");

  $title = $_POST['sub-title'];
  $description = $_POST['sub-description'];
  $printer = $_POST['sub-printerType'];
  $website = $_POST['website'];
  $lat = $_POST['sub-lat'];
  $lon = $_POST['sub-lon'];


  try
  {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO Post (title, content, printer, lat, lon, picture, website) VALUES (:title,:description,:printer,:lat,:lon,:picture,:website)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':printer', $printer);
    $stmt->bindParam(':lat', $lat);
    $stmt->bindParam(':lon', $lon);
    $stmt->bindParam(':picture', $s3file);
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




}




?>
      
  <article id="subpage-article">
    <section id="submain"> <!-- submit your 3d printer and start selling prints -->
    <h2 id="sub-header">Upload a Printer to the Directory and Start Earning Every Print!</h2> <br>
      <form class="input-form" id="search-form" name="submission" action="" method="post" enctype="multipart/form-data">
        <input class="form-input" id="sub-title" type="text" name="sub-title" placeholder="Listing Title" required> <br>
        <input class="form-input" id="sub-printerType" type="text" name="sub-printerType" placeholder="3D Printer Type" required> <br>
        <textarea rows="7" cols="150" class="form-input" id="sub-descrip" name="sub-description" placeholder="Please enter an description of your listing" required></textarea><br>
        <input class="form-input" id="website" type="url" pattern="https?://.+" name="website" placeholder="website" required> <br>
        
        <input class="form-input" id="sub-lat" type="text" pattern="-?\d{1,3}\.\d+" name="sub-lat" placeholder="Latitude" required> 
        <input class="form-input" id="sub-lon" type="text" pattern="-?\d{1,3}\.\d+" name="sub-lon" placeholder="Longitude" required> <br>
        <button class="form-input" id="getlocabutt" type="button" onclick="getLocation()">Get Location</button><br>
        
        <input class="form-input" type="file" name="file" /> <br>
        <input class="form-input" id="sub-submit" type="submit" value="Submit" name="submit">
      </form>
    </section>
  </article>
      
<?php include "./footer.php";?>
