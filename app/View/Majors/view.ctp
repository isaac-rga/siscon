<div class="majors view">
<h2><?php  echo __('Major');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($major['Major']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($major['Department']['name'], array('controller' => 'departments', 'action' => 'view', $major['Department']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Siglas'); ?></dt>
		<dd>
			<?php echo h($major['Major']['major_siglas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Major Name'); ?></dt>
		<dd>
			<?php echo h($major['Major']['major_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Major'), array('action' => 'edit', $major['Major']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Major'), array('action' => 'delete', $major['Major']['id']), null, __('Are you sure you want to delete # %s?', $major['Major']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Majors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Major'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('controller' => 'plans', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Plans');?></h3>
	<?php if (!empty($major['Plan'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Major Id'); ?></th>
		<th><?php echo __('Plan Name'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($major['Plan'] as $plan): ?>
		<tr>
			<td><?php echo $plan['id'];?></td>
			<td><?php echo $plan['major_id'];?></td>
			<td><?php echo $plan['plan_name'];?></td>
			<td><?php echo $plan['active'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'plans', 'action' => 'view', $plan['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'plans', 'action' => 'edit', $plan['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'plans', 'action' => 'delete', $plan['id']), null, __('Are you sure you want to delete # %s?', $plan['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Plan'), array('controller' => 'plans', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
