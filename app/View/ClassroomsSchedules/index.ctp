<div class="classroomsSchedules index">
	<h2><?php echo __('Classrooms Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('classroom_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($classroomsSchedules as $classroomsSchedule): ?>
	<tr>
		<td><?php echo h($classroomsSchedule['ClassroomsSchedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($classroomsSchedule['Classroom']['id'], array('controller' => 'classrooms', 'action' => 'view', $classroomsSchedule['Classroom']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($classroomsSchedule['Schedule']['id'], array('controller' => 'schedules', 'action' => 'view', $classroomsSchedule['Schedule']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $classroomsSchedule['ClassroomsSchedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $classroomsSchedule['ClassroomsSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $classroomsSchedule['ClassroomsSchedule']['id']), null, __('Are you sure you want to delete # %s?', $classroomsSchedule['ClassroomsSchedule']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Classrooms Schedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms'), array('controller' => 'classrooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classroom'), array('controller' => 'classrooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schedules'), array('controller' => 'schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Schedule'), array('controller' => 'schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
