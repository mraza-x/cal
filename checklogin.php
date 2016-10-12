<?php
ob_start();
//Connect to my database
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

echo 'Connected successfully to mr373 database<br />';

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
	echo "<br>";
	echo '<a href="main_login.php">Please Click Here to Login</a>.';
	mysql_close($link);
	ob_end_flush();
  } else {
    $myusername = $_POST['myusername'];
  }
  if (empty($_POST['mypassword'])) {
	  echo "<br>";
    $passErr = "Password is required. ";
	echo $passErr;
	echo "<br>";
	echo '<a href="main_login.php">Please Click Here to Login</a>.';
	mysql_close($link);
	ob_end_flush();
  } else {
    $mypassword = $_POST['mypassword'];
  }
}

//Protect against mySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

//Encrypt the password - database stores hash of passwords
$encrypted_mypassword=hash( 'sha256' , $mypassword );

//mySQL query
$result=mysql_query("SELECT * FROM members WHERE username='$myusername' and password='$encrypted_mypassword'");

//mySQL query to check user or admin
//$usertype=mysql_query("SELECT 'usertype' FROM members WHERE username='$myusername' limit 1");
//echo $usertype;


$user_sql="SELECT usertype FROM members WHERE username='$myusername' limit 1";

$user_result = mysql_query($user_sql) or die();
$row = mysql_fetch_object($user_result);
$user_value = $row->usertype; 


//Count the number of rows in the result
$count=mysql_num_rows($result);

//If only one result, query matches database
if($count==1 && $user_value==1){
	header("Location: index.php");
	die();
	}
elseif($count==1 && $user_value==2){
	header("Location: index.php");
	die();
	}
else {
echo "<br />Wrong Username or Password";
}

//Close the connection
mysql_close($link);
ob_end_flush();
?>