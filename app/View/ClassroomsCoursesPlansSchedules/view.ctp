<div class="classroomsCoursesPlansSchedules view">
<h2><?php echo __('Classrooms Courses Plans Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classroomsCoursesPlansSchedule['ClassroomsCoursesPlansSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroomsCoursesPlansSchedule['Course']['name'], array('controller' => 'courses', 'action' => 'view', $classroomsCoursesPlansSchedule['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroomsCoursesPlansSchedule['Plan']['id'], array('controller' => 'plans', 'action' => 'view', $classroomsCoursesPlansSchedule['Plan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classroom'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroomsCoursesPlansSchedule['Classroom']['id'], array('controller' => 'classrooms', 'action' => 'view', $classroomsCoursesPlansSchedule['Classroom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($classroomsCoursesPlansSchedule['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $classroomsCoursesPlansSchedule['Schedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Semester'); ?></dt>
		<dd>
			<?php echo h($classroomsCoursesPlansSchedule['ClassroomsCoursesPlansSchedule']['semester']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Classrooms Courses Plans Schedule'), array('action' => 'edit', $classroomsCoursesPlansSchedule['ClassroomsCoursesPlansSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Classrooms Courses Plans Schedule'), array('action' => 'delete', $classroomsCoursesPlansSchedule['ClassroomsCoursesPlansSchedule']['id']), null, __('Are you sure you want to delete # %s?', $classroomsCoursesPlansSchedule['ClassroomsCoursesPlansSchedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classroom'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
