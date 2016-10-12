<html>
<body>    
<form action="" method="post">
<?php 
$id = $event->ID;
echo 'Updating event with id: '; echo $id;
echo '';
echo ' :::: Enter new event data here: '; 

?>
  <label for="title">Title:</label>
  <input type="text" name="title"/>
  <label for="detail">Detail:</label>
  <input type="text" name="detail"/>
  <input type="submit" name="submit" value="Submit"/>
</form>    
</body>
</html>
<?php
if(isset($_POST['submit'])) 
{
   // Enter the Code you want to execute after the form has been submitted
  // Dispaly Success or failure Message if any 
  //$id = $event->ID;
	$id = $event->ID;		
	
    $title = $_POST['title'];
	$detail = $_POST['detail'];
	//echo 'inserting here';
	//echo $title;
	//echo $detail;
	$event = Event::upd($id,$title,$detail);
	//echo '<a href="http://localhost/php_mvc_blog/index.php?controller=events&action=index">Please Click Here to See Events</a>.';
	header("Refresh:0; url=https://web.njit.edu/~mr373/cs490/cal_13/?controller=events&action=index");
}



?>