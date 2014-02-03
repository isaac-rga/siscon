<div class="schedules view">
<h2><?php echo __('Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lu'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['lu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ma'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['ma']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mi'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['mi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ju'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['ju']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vi'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['vi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sa'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['sa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Hr'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['start_hr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Min'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['start_min']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Hr'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['end_hr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Min'); ?></dt>
		<dd>
			<?php echo h($schedule['Schedule']['end_min']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Schedule'), array('action' => 'edit', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Schedule'), array('action' => 'delete', $schedule['Schedule']['id']), null, __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Classrooms Courses Plans Schedules'); ?></h3>
	<?php if (!empty($schedule['ClassroomsCoursesPlansSchedules'])): ?>
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
	<?php foreach ($schedule['ClassroomsCoursesPlansSchedules'] as $classroomsCoursesPlansSchedules): ?>
		<tr>
			<td><?php echo $classroomsCoursesPlansSchedules['id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedules['course_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedules['plan_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedules['classroom_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedules['schedule_id']; ?></td>
			<td><?php echo $classroomsCoursesPlansSchedules['semester']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'view', $classroomsCoursesPlansSchedules['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'edit', $classroomsCoursesPlansSchedules['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'delete', $classroomsCoursesPlansSchedules['id']), null, __('Are you sure you want to delete # %s?', $classroomsCoursesPlansSchedules['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
