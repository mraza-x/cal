<p>Here is a list of all events:</p>

<?php foreach($events as $event) { 
?>
  <p>
	
    <?php echo "Event: ";echo $event->Title; ?>
    <a href='?controller=events&action=show&id=<?php echo $event->ID; ?>'>See event</a>
	<a href='?controller=events&action=update&id=<?php echo $event->ID; ?>'>Update event</a>
	<a href='?controller=events&action=delete&id=<?php echo $event->ID; ?>'>Delete event</a>
	
  </p>

<?php }
?>
<a href='?controller=events&action=add'>::Add event::</a>

<a href='?controller=events&action=search'>::Search Events::</a>

