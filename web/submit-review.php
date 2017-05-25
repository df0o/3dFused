<?php
if(isset($_POST['submit_rating']))
{
  define('DB_HOST', '127.0.0.1');
  define('DB_NAME', '3dfused_db');
  define('DB_USER', '3dfused');
  define('DB_PASS', 'lamabatterynexus');

  $conn = new PDO("mysql:host=localhost:3306;dbname=3dfused_db", "3dfused", "lamabatterynexus");
  
  $rating = $_POST['starrating'];
  $content = $_POST['message'];
  $insert = mysql_query("insert into rating values('','$rating','$content')");
  echo "review submitted";
}
?>