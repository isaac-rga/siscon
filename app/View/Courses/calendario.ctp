
<script type="text/javascript">
$(document).ready(function() {

    			// page is now ready, initialize the calendar...

    			$('#calendar').fullCalendar({
        		// put your options and callbacks here
    			})

			});

//$(#calendar).FullCalendar('gotoDate', 1990, 9, 17);
</script>
<?php
//echo $this->Html->script(array('jquery-1.5.min', 'jquery-ui-1.8.9.custom.min', 'fullcalendar.min', 'jquery.qtip-1.0.0-rc3.min', 'ready'), array('inline' => 'false'));
//echo $this->Html->css('fullcalendar', null, array('inline' => false));

//echo $this->Html->script(array($fulcal.'fullcalendar', $fulcal.'ready2', $fulcal.'jquery.min',), array('inline'=> 'false'));
echo $this->Html->css('fullcalendar', null, array('inline'=>false));
echo $this->Html->script('fullcalendar');
echo $this->Html->script('jquery.min');

?>


<!--<div class="Calendar index"> -->
	<div id="calendar"></div>
<!--</div>
<div class="actions">
	<ul>
	    <li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events', true), array('controller' => 'events')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events Types', true), array('controller' => 'event_types')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses', true), array('controller' => 'courses', 'action'=>'index')); ?></li>
	</ul>
</div>-->