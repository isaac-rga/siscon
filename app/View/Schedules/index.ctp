<div class="schedules index">
	<h2><?php echo __('Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('lu'); ?></th>
			<th><?php echo $this->Paginator->sort('ma'); ?></th>
			<th><?php echo $this->Paginator->sort('mi'); ?></th>
			<th><?php echo $this->Paginator->sort('ju'); ?></th>
			<th><?php echo $this->Paginator->sort('vi'); ?></th>
			<th><?php echo $this->Paginator->sort('sa'); ?></th>
			<th><?php echo $this->Paginator->sort('start_hr'); ?></th>
			<th><?php echo $this->Paginator->sort('start_min'); ?></th>
			<th><?php echo $this->Paginator->sort('end_hr'); ?></th>
			<th><?php echo $this->Paginator->sort('end_min'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($schedules as $schedule): ?>
	<tr>
		<td><?php echo h($schedule['Schedule']['id']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['created']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['lu']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['ma']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['mi']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['ju']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['vi']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['sa']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['start_hr']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['start_min']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['end_hr']); ?>&nbsp;</td>
		<td><?php echo h($schedule['Schedule']['end_min']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $schedule['Schedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $schedule['Schedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $schedule['Schedule']['id']), null, __('Are you sure you want to delete # %s?', $schedule['Schedule']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Schedule'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classrooms Courses Plans Schedules'), array('controller' => 'classrooms_courses_plans_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
