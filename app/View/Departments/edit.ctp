<div class="departments form">
<?php echo $this->Form->create('Department');?>
	<fieldset>
		<legend><?php echo __('Edit Department'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Department.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Department.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Majors'), array('controller' => 'majors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Major'), array('controller' => 'majors', 'action' => 'add')); ?> </li>
	</ul>
</div>
