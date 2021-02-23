<?php
$name=$email=$date=$beach=$weight=$unit=$feedback="";

//get the form elements and store them in a variable
if (! is_page("contribute-to-marine-pollution-data-collection") == "POST") {
  $name=test_input($_POST["name"]);
  $email=test_input($_POST["email"]);
  $date=test_input($_POST["date"]);
  $beach=test_input($_POST["beach"]);
  $weight=test_input($_POST["weight"]);
// $unit=$_POST["unit"];
  $feedback=test_input($_POST["feedback"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', '***');
define('DB_PASSWORD', '***');
define('DB_NAME', 'nwedgeor_Balnakeil_Plastic');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
  }

//insert data
$query1 ="INSERT INTO `WeightData` (Beach, Dates, Weight, person) VALUES ($beach, $date,$weight,$email)";
$result1 = $mysqli->query($query1);
//attach coordinates to the beach
$query2 ="UPDATE `WeightData`AS A JOIN `Beach2coord` AS B ON A.Beach = B.Beach SET A.Lat=B.Lat, A.Longit = B.Lon";
$result2 = $mysqli->query($query2);
//free memory associated with result
$result1->close();
$result2->close();
//close connection
$mysqli->close();
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
  echo "Invalid Sender's Email";
  }
$subject ="Data Submission"
$headers ='From: databot@plasticatbay.org.rn';
$message = wordwrap("name:\t$name\nemail:\t$email\ndate:\t$date\nbeach:\t$beach\nWeigth:\t$weight $unit\nmsg:\n",70);
wp_mail("julien.moreau@plasticatbay.org",$subject,$message,$headers);
echo "Thanks for the submission!";
//Redirects to the success page
header("Location: https://www.plasticatbay.org/contribute-to-marine-pollution-data-collection");
?>
