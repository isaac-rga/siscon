<div class="plans form">
<?php echo $this->Form->create('Plan'); ?>
	<fieldset>
		<legend><?php echo __('Add Plan'); ?></legend>
	<?php
		echo $this->Form->input('major_id');
		echo $this->Form->input('plan_name');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Plans'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Majors'), array('controller' => 'majors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Major'), array('controller' => 'majors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedule'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
