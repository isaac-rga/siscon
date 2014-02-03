<div class="classrooms view">
<h2><?php echo __('Classroom'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($classroom['Classroom']['number']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Classroom'), array('action' => 'edit', $classroom['Classroom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Classroom'), array('action' => 'delete', $classroom['Classroom']['id']), null, __('Are you sure you want to delete # %s?', $classroom['Classroom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classroom'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedule'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Classrooms Courses Plans Schedules'); ?></h3>
	<?php if (!empty($classroom['ClassroomsCoursesPlansSchedule'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Plan Id'); ?></th>
		<th><?php echo __('Classroom Id'); ?></th>
		<th><?php echo __('Schedule Id'); ?></th>
		<th><?php echo __('Semester'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($classroom['ClassroomsCoursesPlansSchedule'] as $classroomsCoursesPlansSchedule): ?>
		<tr>
			<td><?php echo $classroomsCoursesPlansSchedule['id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedule['course_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedule['plan_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedule['classroom_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedule['schedule_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedule['semester']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'view', $classroomsCoursesPlansSchedule['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'edit', $classroomsCoursesPlansSchedule['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'delete', $classroomsCoursesPlansSchedule['id']), null, __('Are you sure you want to delete # %s?', $classroomsCoursesPlansSchedule['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedule'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
