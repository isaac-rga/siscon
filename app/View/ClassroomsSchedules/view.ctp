<div class="classroomsSchedules view">
<h2><?php echo __('Classrooms Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classroomsSchedule['ClassroomsSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classroom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroomsSchedule['Classroom']['id'], array('controller' => 'classrooms', 'action' => 'view', $classroomsSchedule['Classroom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroomsSchedule['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $classroomsSchedule['Schedule']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Classrooms Schedule'), array('action' => 'edit', $classroomsSchedule['ClassroomsSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Classrooms Schedule'), array('action' => 'delete', $classroomsSchedule['ClassroomsSchedule']['id']), null, __('Are you sure you want to delete # %s?', $classroomsSchedule['ClassroomsSchedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classroom'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
