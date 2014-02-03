<div class="classroomsSchedules form">
<?php echo $this->Form->create('ClassroomsSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Edit Classrooms Schedule'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('classroom_id');
		echo $this->Form->input('schedule_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClassroomsSchedule.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ClassroomsSchedule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classroom'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
