<div class="coursesTeachers view">
<h2><?php echo __('Courses Teacher'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coursesTeacher['CoursesTeacher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesTeacher['Course']['name'], array('controller' => 'courses', 'action' => 'view', $coursesTeacher['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teacher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesTeacher['Teacher']['name'], array('controller' => 'teachers', 'action' => 'view', $coursesTeacher['Teacher']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Courses Teacher'), array('action' => 'edit', $coursesTeacher['CoursesTeacher']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Courses Teacher'), array('action' => 'delete', $coursesTeacher['CoursesTeacher']['id']), null, __('Are you sure you want to delete # %s?', $coursesTeacher['CoursesTeacher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Teachers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Teacher'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>
