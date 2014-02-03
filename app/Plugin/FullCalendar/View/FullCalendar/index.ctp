<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>
<?php
echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready'), array('inline' => 'false'));
echo $this->Html->css('/full_calendar/css/fullcalendar', null, array('inline' => false));
?>


<div class="Calendar index">
	<div id="calendar"></div>
</div>
<div class="actions">
	<!--<ul>
	    <li><?php echo $this->Html->link(__('New Event', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events', true), array('plugin' => 'full_calendar', 'controller' => 'events')); ?></li>
		<li><?php echo $this->Html->link(__('Manage Events Types', true), array('plugin' => 'full_calendar', 'controller' => 'event_types')); ?></li>
		
			
		
	</ul>-->
	<fieldset>
		<legend>Buscar por plan</legend>
	<?php
		echo $this->Form->create('searchPlan', array('url'=>'/full_calendar'));
		echo $this->Form->input('Major', array(
			'options'=>$majors,
			'empty'=>'Escoja carrera',
			'selected'=>'empty',
			'label'=>'Buscar por carrera',
			'id'=>'major_search',
			'div'=>false));

		echo "</br></br>";


		/*$this->Js->event('change',
			$this->Js->request(
				array(
					'action'=>'escogePlan'),
				array(
					'async'=>true,
					'update'=>'plan_search')));*/

		$this->Js->get('#major_search')->event('change', $this->Js->request( 
			array('action' => 'escogePlan'), 
			array( 
			'update' => '#plan_search',
			'async' => true, 
			'dataExpression' => true, 
			'method' => 'post', 
			'data' => $this->Js->get('#major_search')->serializeForm(array('isForm' => true, 'inline' => true))))); 
	?>
	<div id="plan_search"></div>
<?php
	echo $this->Form->end('Buscar', array(
			'label'=>false,
			'div'=>false));
?>

	</fieldset>

	<fieldset>
	<legend>Buscar por materia</legend>
	<?php
		echo $this->Form->create('searchCourse', array('url'=>'/full_calendar'));
		
		echo $this->Form->input('Course.code', array(
			'id'=>'courseCode',
			'class'=>'courseCode',
			'label'=>'Buscar por código de materia',
			'div'=>false));

		$this->Js->get('#courseCode')->event('change', $this->Js->request( 
			array( 
			'update' => '#plan_search',
			'async' => true, 
			'dataExpression' => true, 
			'method' => 'post', 
			'data' => $this->Js->get('#major_search')->serializeForm(array('isForm' => true, 'inline' => true)))));

		echo "</br></br>";

		echo $this->Form->input('Course.name', array(
			'class'=>'courseName',
			'label'=>'Buscar por nombre de materia',
			'div'=>false));

		echo "</br></br>";

		echo $this->Form->end('Buscar', array(
			'label'=>false,
			'div'=>false));
		/*$this->Js->event('change',
			$this->Js->request(
				array(
					'action'=>'escogePlan'),
				array(
					'async'=>true,
					'update'=>'plan_search')));*/

		/*$this->Js->get('#major_search')->event('change', $this->Js->request( 
			array('action' => 'escogePlan'), 
			array( 
			'update' => '#plan_search',
			'async' => true, 
			'dataExpression' => true, 
			'method' => 'post', 
			'data' => $this->Js->get('#major_search')->serializeForm(array('isForm' => true, 'inline' => true))))); */
	?>
	</fieldset>

<fieldset>
	<legend>Buscar por profesor</legend>
	<?php
		echo $this->Form->create('searchTeacher', array('url'=>'/full_calendar'));
		
		echo $this->Form->input('Teacher.code', array(
			'label'=>'Buscar por matrícula de profesor',
			'div'=>false));

		echo "</br></br>";

		echo $this->Form->input('Teacher.name', array(
			'label'=>'Buscar por nombre de profesor',
			'div'=>false));

		echo "</br></br>";

		echo $this->Form->end('Buscar', array(
			'label'=>false,
			'div'=>false));
		/*$this->Js->event('change',
			$this->Js->request(
				array(
					'action'=>'escogePlan'),
				array(
					'async'=>true,
					'update'=>'plan_search')));*/

		/*$this->Js->get('#major_search')->event('change', $this->Js->request( 
			array('action' => 'escogePlan'), 
			array( 
			'update' => '#plan_search',
			'async' => true, 
			'dataExpression' => true, 
			'method' => 'post', 
			'data' => $this->Js->get('#major_search')->serializeForm(array('isForm' => true, 'inline' => true))))); */
	?>
	</fieldset>

<fieldset>
	<legend>Buscar por sal&oacute;n</legend>
	<?php
		echo $this->Form->create('searchClassroom', array('url'=>'/full_calendar'));
		
		echo $this->Form->input('Classroom.location', array(
			'label'=>'Edificio',
			'div'=>false));

		echo "</br></br>";

		echo $this->Form->input('Classroom.number', array(
			'label'=>'Salón',
			'div'=>false));

		echo "</br></br>";

		echo $this->Form->end('Buscar', array(
			'label'=>false,
			'div'=>false));
		/*$this->Js->event('change',
			$this->Js->request(
				array(
					'action'=>'escogePlan'),
				array(
					'async'=>true,
					'update'=>'plan_search')));*/

		/*$this->Js->get('#major_search')->event('change', $this->Js->request( 
			array('action' => 'escogePlan'), 
			array( 
			'update' => '#plan_search',
			'async' => true, 
			'dataExpression' => true, 
			'method' => 'post', 
			'data' => $this->Js->get('#major_search')->serializeForm(array('isForm' => true, 'inline' => true))))); */
	?>
	</fieldset>

	
</div>
<?php
echo $this->Js->writeBuffer();
?>
