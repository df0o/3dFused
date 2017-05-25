<?php
if ( empty( $_POST ) ){
?>
  <form name='registration' action='user_register.php' method='POST'/>
    <label for 'user_name'>User Name: </label>
    <input type="text" name="user_name" />
    <label for 'password'>Password: </label>
    <input type="password" name="password" />
    <label for 'email'>Email: </label>
    <input type="text" name="email" />
    <label for 'first_name'>First Name: </label>
    <input type="text" name="first_name" />
    <label for 'last_name'>Last Name: </label>
    <input type="text" name="last_name" />
    <label for 'state'>State: </label>
    <input type="text" name="state" />
    <label for 'city'>City: </label>
    <input type="text" name="city" />
    <label for 'street'>Street: </label>
    <input type="text" name="street" />
    <label for 'zip'>Zip: </label>
    <input type="text" name="zip" />
    <button type="submit">Submit</button>
  </form>
<?php
} else {
try{
  $servername = "localhost:3306";
  $db_user = "3dfused";
  $db_pass = "lamabatterynexus";
  $dbname = "3dfused_db";
  $db = new PDO( 'mysql:host=$servername;dbname=$dbname', $db_user, $db_pass );
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $form = $_POST;
  $username = $form[ 'user_name' ];
  $password = $form[ 'password' ];
  $email = $form[ 'email' ];
  $street = $form[ 'street' ];
  $city = $form[ 'city' ];
  $state = $form[ 'state' ];
  $zip = $form[ 'zip' ];
  $last_name = $form[ 'last_name' ];
  $first_name = $form[ 'first_name' ];

  $sql = "INSERT INTO User ( username, password, email, create_date, last_name, first_name, street, city, state, zip ) VALUES ( :username, :password, :email, NOW(), :last_name, :first_name, :street, :city, :state, :zip  )";

  $query = $db->prepare( $sql );
  $query->execute( array( ':username'=>$username, ':password'=>$password, ':email'=>$email, ':last_name'=>$last_name, ':first_name'=>$first_name, ':street'=>$street, ':city'=>$city, ':state'=>$state, ':zip'=>$zip ) );
  }
  catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
?>
