<?php
//include_once 'views/events/add.php';
  class EventsController {
    public function index() {
      // we store all the posts in a variable
      $events = Event::all();
      require_once('views/events/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=events&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $event = Event::find($_GET['id']);
      require_once('views/events/show.php');
    }
	
	public function add() {
		
		//echo 'getting add info here';

		 include_once 'views/events/add.php';
	
	}
	
	public function delete() {
     
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $event = Event::remove($_GET['id']);

    }
	
	
		public function update() {
			if (!isset($_GET['id']))
        return call('pages', 'error');

         //we use the given id to get the right post
          $event = Event::find($_GET['id']);
   
		 include_once 'views/events/update.php';

	}
	
	public function search() {
            
      require_once('views/events/search.php');
    }
  }
  ?>

		 
		 
	

		
    

    
	
	
    
	
  
