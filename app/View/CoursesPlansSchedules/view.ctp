<div class="coursesPlansSchedules view">
<h2><?php echo __('Courses Plans Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coursesPlansSchedule['CoursesPlansSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesPlansSchedule['Course']['name'], array('controller' => 'courses', 'action' => 'view', $coursesPlansSchedule['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesPlansSchedule['Plan']['id'], array('controller' => 'plans', 'action' => 'view', $coursesPlansSchedule['Plan']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesPlansSchedule['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $coursesPlansSchedule['Schedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Semester'); ?></dt>
		<dd>
			<?php echo h($coursesPlansSchedule['CoursesPlansSchedule']['semester']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Courses Plans Schedule'), array('action' => 'edit', $coursesPlansSchedule['CoursesPlansSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Courses Plans Schedule'), array('action' => 'delete', $coursesPlansSchedule['CoursesPlansSchedule']['id']), null, __('Are you sure you want to delete # %s?', $coursesPlansSchedule['CoursesPlansSchedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Plans Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Plans Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
