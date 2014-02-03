<div class="coursesPlansSchedules index">
	<h2><?php echo __('Courses Plans Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('plan_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('semester'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($coursesPlansSchedules as $coursesPlansSchedule): ?>
	<tr>
		<td><?php echo h($coursesPlansSchedule['CoursesPlansSchedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($coursesPlansSchedule['Course']['name'], array('controller' => 'courses', 'action' => 'view', $coursesPlansSchedule['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($coursesPlansSchedule['Plan']['id'], array('controller' => 'plans', 'action' => 'view', $coursesPlansSchedule['Plan']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($coursesPlansSchedule['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $coursesPlansSchedule['Schedule']['id'])); ?>
		</td>
		<td><?php echo h($coursesPlansSchedule['CoursesPlansSchedule']['semester']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coursesPlansSchedule['CoursesPlansSchedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coursesPlansSchedule['CoursesPlansSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coursesPlansSchedule['CoursesPlansSchedule']['id']), null, __('Are you sure you want to delete # %s?', $coursesPlansSchedule['CoursesPlansSchedule']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Courses Plans Schedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
