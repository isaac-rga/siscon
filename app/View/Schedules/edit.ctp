<div class="schedules form">
<?php echo $this->Form->create('Schedule'); ?>
	<fieldset>
		<legend><?php echo __('Edit Schedule'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('lu');
		echo $this->Form->input('ma');
		echo $this->Form->input('mi');
		echo $this->Form->input('ju');
		echo $this->Form->input('vi');
		echo $this->Form->input('sa');
		echo $this->Form->input('start_hr');
		echo $this->Form->input('start_min');
		echo $this->Form->input('end_hr');
		echo $this->Form->input('end_min');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Schedule.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Schedule.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
