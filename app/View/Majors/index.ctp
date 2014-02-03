<div class="majors index">
	<h2><?php echo __('Majors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('department_id');?></th>
			<th><?php echo $this->Paginator->sort('major_siglas');?></th>
			<th><?php echo $this->Paginator->sort('major_name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($majors as $major): ?>
	<tr>
		<td><?php echo h($major['Major']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($major['Department']['name'], array('controller' => 'departments', 'action' => 'view', $major['Department']['id'])); ?>
		</td>
		<td><?php echo h($major['Major']['major_siglas']); ?>&nbsp;</td>
		<td><?php echo h($major['Major']['major_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $major['Major']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $major['Major']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $major['Major']['id']), null, __('Are you sure you want to delete # %s?', $major['Major']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Major'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
	</ul>
</div>
