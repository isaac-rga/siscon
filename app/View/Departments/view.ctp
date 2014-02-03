<div class="departments view">
<h2><?php  echo __('Department');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($department['Department']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($department['Department']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($department['Department']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Department'), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Department'), array('action' => 'delete', $department['Department']['id']), null, __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Majors'), array('controller' => 'majors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Major'), array('controller' => 'majors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Majors');?></h3>
	<?php if (!empty($department['Major'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Major Siglas'); ?></th>
		<th><?php echo __('Major Name'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($department['Major'] as $major): ?>
		<tr>
			<td><?php echo $major['id'];?></td>
			<td><?php echo $major['department_id'];?></td>
			<td><?php echo $major['major_siglas'];?></td>
			<td><?php echo $major['major_name'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'majors', 'action' => 'view', $major['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'majors', 'action' => 'edit', $major['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'majors', 'action' => 'delete', $major['id']), null, __('Are you sure you want to delete # %s?', $major['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Major'), array('controller' => 'majors', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
