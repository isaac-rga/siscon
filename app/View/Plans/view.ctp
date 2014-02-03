<div class="plans view">
<h2><?php echo __('Plan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major'); ?></dt>
		<dd>
			<?php echo $this->Html->link($plan['Major']['id'], array('controller' => 'majors', 'action' => 'view', $plan['Major']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan Name'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['plan_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['active']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plan'), array('action' => 'edit', $plan['Plan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plan'), array('action' => 'delete', $plan['Plan']['id']), null, __('Are you sure you want to delete # %s?', $plan['Plan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Majors'), array('controller' => 'majors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Major'), array('controller' => 'majors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedule'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Classrooms Courses Plans Schedules'); ?></h3>
	<?php if (!empty($plan['ClassroomsCoursesPlansSchedule'])): ?>
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
	<?php foreach ($plan['ClassroomsCoursesPlansSchedule'] as $classroomsCoursesPlansSchedule): ?>
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
