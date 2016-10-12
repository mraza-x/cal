<?php
ob_start();
//Connect to my database
$myusername = "";
$mypassword = "";
$nameErr = "";
$passErr = "";
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

//Select the database
$db_selected = mysql_select_db('mr373', $link);
if (!$db_selected) {
    die ('Can\'t use mr373 : ' . mysql_error());
}

//Getting the entered username and password
//$myusername=$_POST['myusername'];
//$mypassword=$_POST['mypassword'];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST['myusername'])) {
		echo "<br>";
    $nameErr = "Name is required. ";
	echo $nameErr;
	echo "Your information Failed to be Added....";
	echo ".<br>";
	echo '<a href="signup.php">Please Click Here to Register</a>.';
	mysql_close($link);
	ob_end_flush();
  } else {
    $myusername = $_POST['myusername'];
  }
  if (empty($_POST['mypassword'])) {
	  echo "<br>";
    $passErr = "Password is required. ";
	echo $passErr;
	echo "Your information Failed to be Added....";
	echo ".<br>";
	echo '<a href="signup.php">Please Click Here to Register</a>.';
	mysql_close($link);
	ob_end_flush();
  } else {
    $mypassword = $_POST['mypassword'];
  }
}

//Encrypt the password - database stores hash of passwords
$encrypted_mypassword=hash( 'sha256' , $mypassword );


//mySQL query
$sqlinsert = "INSERT into members(username,password) values ('$myusername','$encrypted_mypassword')";
$resultinginsert = mysql_query($sqlinsert);
if($resultinginsert )
{
	echo "Your information was successfully Added...";
	echo '<a href="main_login.php">Please Click Here to Login</a>.';
	
}
//else
//{
//	echo "Your information Failed to be Added....";
//	echo '<a href="https://web.njit.edu/~mr373/cs490/signup.php">Please Click Here to Register</a>.';
//}

//Close the connection
mysql_close($link);
ob_end_flush();
?>