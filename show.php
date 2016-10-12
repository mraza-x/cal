<p>This is the requested event:</p>

<p><?php echo "ID: ";echo $event->ID; ?></p>
<p><?php echo "Title: ";echo $event->Title; ?></p>
<p><?php echo "Detail: ";echo $event->Detail; 

?></p>
<a href='?controller=events&action=update&id=<?php echo $event->ID; ?>'>Update event::</a>

<a href='?controller=events&action=delete&id=<?php echo $event->ID; ?>'>::Delete event</a>