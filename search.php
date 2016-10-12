<html>
<body>    
<form action="" method="post">
<?php echo 'Enter search term here:'; ?>
  <input type="text" name="term"/>
  
    
<select name="dropdown">
<option value="Title">Title</option>
<option value="Detail">Detail</option>
</select>

  
  <input type="submit" name="submit"/>

</form>    
</body>
</html>
<?php
if(isset($_POST['submit'])) 
{

    $term = $_POST['term'];
	$var = $_POST['dropdown'];
	
	switch($var)
    {
      case "Title": 
	  $event = Event::searchTitle($term);
	  break;
      case "Detail":
	  $event = Event::searchDetail($term);
	  break;
      
      default: echo("Error!"); exit(); break;
    }
   
	
	//echo '<a href="http://localhost/php_mvc_blog/index.php?controller=events&action=index">Please Click Here to See Events</a>.';
	//header("Refresh:0; url=http://localhost/php_mvc_blog/index.php?controller=events&action=index");
}



?>
