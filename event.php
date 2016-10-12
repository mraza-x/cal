<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

/*

require_once '../connection.php';
$order = "ID";
$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_STRING);
$title = filter_input(INPUT_POST,"title",FILTER_SANITIZE_STRING);
$detail = filter_input(INPUT_POST,"detail",FILTER_SANITIZE_STRING);
$eventdate = filter_input(INPUT_POST,"eventdate",FILTER_SANITIZE_STRING);
$starttime = filter_input(INPUT_POST,"starttime",FILTER_SANITIZE_STRING);
$endtime = filter_input(INPUT_POST,"endtime",FILTER_SANITIZE_STRING);    

echo $_SERVER['PATH_INFO'];

$urlParams = explode('/', $_SERVER['PATH_INFO']);
$func = $urlParams[1];

*/














  class Event {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $title;
    public $detail;
	

    public function __construct($id, $title, $detail) {
      $this->ID      = $id;
      $this->Title  = $title;
      $this->Detail = $detail;
    }
	
	 

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM eventcalendar');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $event) {
        $list[] = new Event($event['ID'], $event['Title'], $event['Detail']);
      }

      return $list;
	  
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM eventcalendar WHERE ID = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $event = $req->fetch();

      return new Event($event['ID'], $event['Title'], $event['Detail']);
    }
	
	public static function insert($title,$detail) {
		
	 //echo 'inserting here';
	// echo $title,$detail;
	 
	 $db = Db::getInstance();
	 $req = $db->query("INSERT INTO eventcalendar (Title, Detail) VALUES ('$title','$detail')");
	 
	 
	 
		
	}
	
  
  public static function remove($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM eventcalendar WHERE ID = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $event = $req->fetch();

      //return new Event($event['ID'], $event['Title'], $event['Detail']);
	  
	  $req = $db->query("DELETE FROM eventcalendar WHERE ID ='".$id."'");
	header("Refresh:0; url=https://web.njit.edu/~mr373/cs490/cal_13/?controller=events&action=index");

    }
	
	public static function upd($id,$title,$detail) {
		
	 
	 $db = Db::getInstance();
	 $id = intval($id);
	 
      $req = $db->prepare('SELECT * FROM eventcalendar WHERE ID = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
	  
      $event = $req->fetch();
	  
	  //echo $id;
	  //echo $title;
	  //echo $detail;
	  
	 $req = $db->query("UPDATE eventcalendar SET Title = '".$title."', Detail = '".$detail."' WHERE ID ='".$id."'");
	
	 
		
	}
	
	public static function searchTitle($term) {
		
	 
	  $db = Db::getInstance();
	 
	 echo "Searching title for: ".$term."<br>";
	 echo "Results:<br>";
	 $search = $db->prepare("SELECT ID, Title, Detail FROM eventcalendar WHERE Title LIKE ?");

	 $search->execute(array("%$term%"));

		foreach($search as $s) {
			$id = $s['ID'];
			$title = $s['Title'];
			$detail = $s['Detail'];
			
			echo "Event Title: ".$title;
			
			echo "<br>";
			
			$link = "https://web.njit.edu/~mr373/cs490/cal_13/?controller=events&action=show&id=$id";
			echo "<a href='".$link."'>Please Click Here to See This Event</a>";
			echo "<br>";
		
		
		}
	
	
	}
	
	public static function searchDetail($term) {
		
	 
	 $db = Db::getInstance();
		
	 
	 echo "Searching detail for: ".$term."<br>";
	 echo "Results:<br>";
	 $search = $db->prepare("SELECT ID, Title, Detail FROM eventcalendar WHERE Detail LIKE ?");

	 $search->execute(array("%$term%"));
		
		foreach($search as $s) {
			$id = $s['ID'];
		    $title = $s['Title'];
			$detail = $s['Detail'];
			
			echo "Event Title: ".$title;
			
			echo "<br>";
			$link = "https://web.njit.edu/~mr373/cs490/cal_13/?controller=events&action=show&id=$id";
			echo "<a href='".$link."'>Please Click Here to See This Event</a>";
			echo "<br>";
			}

	}
  }
  
/*
  
  if (isset($func) && method_exists('Event',$func)){
  //echo $id, $func, $title, $detail, $eventdate, $starttime, $endtime;
  $view = new Event($id, $title, $detail);
  $view->$func($id, $title, $detail);
  //echo 'End';
} 
else {
  echo 'Function not found';
}
*/
?>