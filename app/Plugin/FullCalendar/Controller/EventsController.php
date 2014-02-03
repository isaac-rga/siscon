<?php
/*
 * Controller/EventsController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

class EventsController extends FullCalendarAppController {

	var $name = 'Events';

        var $paginate = array(
            'limit' => 15
        );

    function index() 
    {
    	$this->loadModel('ClassroomsCoursesPlansSchedule' );

    	$sesion_plan = CakeSession::read('buscaPlan');
    	debug($sesion_plan);
    	/*if(!empty($sesion_plan))
    	{
    		//debug($sesion_plan);
    		$conditions = array('Plan.id'=>$sesion_plan['search']['Plan']);
    		//debug($conditions);
    	}*/

    	/*$cursos = $this->Course->CoursesPlansSchedule->Plan->find('all', array(
    		'fields'=>array('Plan.*', 'CoursesPlan.*', 'Course.*', 'Schedule.*', 'Major.*', 'Classroom.*', 'Teacher.*'),
    		'joins'=>array(
    			array(
    				'table'=>'courses_plans_schedules',
    				'alias'=>'CoursesPlan',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'CoursesPlan.plan_id = Plan.id')),
    			array(
    				'table'=>'schedules',
    				'alias'=>'Schedule',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'Schedule.id = CoursesPlan.schedule_id')),
    			array(
    				'table'=>'courses',
    				'alias'=>'Course',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'Course.id = CoursesPlan.course_id ')),
    			array(
    				'table'=>'majors',
    				'alias'=>'Major',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'Major.id = Plan.major_id')),
    			array(
    				'table'=>'classrooms_schedules',
    				'alias'=>'CS',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'CS.schedule_id = Schedule.id')),
    			array(
    				'table'=>'classrooms',
    				'alias'=>'Classroom',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'Classroom.id = CS.classroom_id')),
    			array(
    				'table'=>'courses_teachers',
    				'alias'=>'CT',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'CT.course_id = Course.id')),
    			array(
    				'table'=>'teachers',
    				'alias'=>'Teacher',
    				'type'=>'INNER',
    				'conditions'=>array(
    					'Teacher.id = CT.teacher_id'))),
    		'conditions'=>array('Plan.id'=>2),
    		'recursive' => -1));*/

    	//debug($cursos);
    	$this->ClassroomsCoursesPlansSchedule->Behaviors->load('Containable');
    	$cursos = $this->ClassroomsCoursesPlansSchedule->find('all', array(
    		//'fields'=>array('Plan.*' ,'Course.*', 'CoursesPlansSchedule.semester', 'Schedule.*', 'Major.*', 'Classroom.*', 'Teacher.*'),
    		'contain'=>array(
    			'Course'=>array(
    				
    					'Teacher'=>array(
    						'fields'=>array(
    							'name'))),
    			'Classroom',
    			'Plan'=>array(
    				'fields'=>array(
    					'plan_name')),
    			'Schedule'),
    		'conditions'=>array(
    			'Plan.id'=>2),
    		'recursive'=>2));

    	debug($cursos);
    	$used_schedules = array();
    	for($indice = 0; $indice < sizeof($cursos); $indice++)
    	{
    		if(array_key_exists($cursos[$indice]['Schedule']['id'], $used_schedules) === false)
    		{
    			$used_schedules[$cursos[$indice]['Schedule']['id']] = $cursos[$indice]['Schedule']['id'];
    			$cursos[$indice]['color'] = 'blue';
    			debug('blue');
    		}
    		else
    		{
    			$cursos[$indice]['color'] = 'red';
    			debug('red');
    		}


    		$cursos[$indice]['Teacher'] = $cursos[$indice]['Course']['CoursesTeacher'][0]['Teacher'];
    		$cursos[$indice]['Classroom'] = $cursos[$indice]['Schedule']['ClassroomsSchedule'][0]['Classroom']['location'].'-'.$cursos[$indice]['Schedule']['ClassroomsSchedule'][0]['Classroom']['number'];
    		$cursos[$indice]['Semester'] = $cursos[$indice]['CoursesPlansSchedule']['semester'];
    		unset($cursos[$indice]['CoursesPlansSchedule']);
    		unset($cursos[$indice]['Schedule']['ClassroomsSchedule']); 
    		unset($cursos[$indice]['Course']['CoursesTeacher']);
    	}
    	debug($used_schedules);

    	debug($cursos);



    	date_default_timezone_set('America/Monterrey');
    	foreach($cursos as $curso)
    	{
    		
    		$inicio_stamp = strtotime("wednesday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    		//debug($inicio_stamp);
    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
    		$end_stamp = strtotime("wednesday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

    		$data[] = array(
    			'id'=>$curso['Course']['id'],
    			'title'=>$curso['Course']['name'],
    			'start'=>$inicio_stamp,
    			'end'=>$end_stamp,
    			'allDay'=>false,
    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
    				$curso['Plan']['plan_name']."</br>".
    				$curso['Semester']."º Semestre</br>".
    				$curso['Teacher']['name']."</br>".
    				$curso['Classroom'],
    			'color'=>$curso['color']);

    	}
    	debug($data);

		$this->Event->recursive = 1;
		$this->set('events', $this->paginate());
	}



	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
		$this->set('eventTypes', $this->Event->EventType->find('list'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

        // The feed action is called from "webroot/js/ready.js" to get the list of events (JSON)
	function feed($id=null) {

    	/*debug($cursos);*/
		$this->layout = "ajax";
		$vars = $this->params['url'];
		$conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
		$events = $this->Event->find('all', $conditions);
		foreach($events as $event) {
			if($event['Event']['all_day'] == 1) {
				$allday = true;
				$end = $event['Event']['start'];
			} else {
				$allday = false;
				$end = $event['Event']['end'];
			}
			$data[] = array(
					'id' => $event['Event']['id'],
					'title'=>$event['Event']['title'],
					'start'=>$event['Event']['start'],
					'end' => $end,
					'allDay' => $allday,
					'url' => Router::url('/') . 'full_calendar/events/view/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'color' => $event['EventType']['color']
			);
		}
		//debug($data);
		$data = null;

		$this->loadModel('Course', 'CoursesPlansSchedule', 'Plan', 'Teacher', 'Schedule', 'Classroom', 'ClassroomsSchedule', 'CoursesTeacher');

		$sesion_plan = $this->Session->read('buscaPlan');
		//debug($sesion_plan);
		if(!empty($sesion_plan))
    	{
    		//debug($sesion_plan);
    		//debug($sesion_plan);
    		$conditions_class = null;
    		$conditions=null;
    		if(!empty($sesion_plan['searchPlan']))
    		{
    			$conditions = array(
    				'Plan.id'=>$sesion_plan['searchPlan']['Plan'],
    				'ClassroomsCoursesPlansSchedule.semester'=>$sesion_plan['searchPlan']['Semestre']);
    		}
    		else if(!empty($sesion_plan['Course']))
    		{
    			if(!empty($sesion_plan['Course']['code']))
    			{
    				$separados = preg_split("/[\s-]+/", $sesion_plan['Course']['code']);
    				//debug($separados);
    				$conditions = array(
    					'Course.code LIKE'=>'%'.$separados[0].'%',
    					'Course.number LIKE'=>'%'.$separados[1].'%');
    			}
    			else if(!empty($sesion_plan['Course']['name']))
    			{
    				$conditions = array(
    					'Course.name LIKE'=>'%'.$sesion_plan['Course']['name'].'%');
    			}
    		}
    		else if(!empty($sesion_plan['Teacher']))
    		{
    			if(!empty($sesion_plan['Course']['code']))
    			{
    				$conditions = array(
    					'Teacher.code LIKE'=>'%'.$sesion_plan['Course']['code'].'%');
    			}
    			else if(!empty($sesion_plan['Course']['name']))
    			{
    				$conditions = array(
    					'Teacher.name LIKE'=>'%'.$sesion_plan['Course']['name'].'%');
    			}
    		}
    		else if(!empty($sesion_plan['Classroom']))
    		{
    			if(!empty($sesion_plan['Classroom']['location']) AND !empty($sesion_plan['Classroom']['number']))
    			{
    				$conditions_class = array(
    					'Classroom.location LIKE'=>'%'.$sesion_plan['Classroom']['location'].'%',
    					'Classroom.number LIKE' =>'%'.$sesion_plan['Classroom']['number'].'%');
    			}
    		}
    	}


    	//$this->loadModel('Course', 'CoursesPlansSchedule', 'Plan', 'Teacher', 'Schedule', 'Classroom', 'ClassroomsSchedule', 'CoursesTeacher');

    	$this->Course->ClassroomsCoursesPlansSchedule->Behaviors->load('Containable');
    	/*$this->Plan->Behaviors->load('Containable');
    	$this->Teacher->Behaviors->load('Containable');
    	$this->Schedule->Behaviors->load('Containable');
    	$this->Classroom->Behaviors->load('Containable');
    	$this->ClassroomsSchedule->Behaviors->load('Containable');*/
    	//$this->CoursesTeacher->Behaviors->load('Containable');
    	
    	$this->Course->ClassroomsCoursesPlansSchedule->recursive = 2;
    	$cursos = $this->Course->ClassroomsCoursesPlansSchedule->find('all', array(
    		//'fields'=>array('Plan.*' ,'Course.*', 'CoursesPlansSchedule.semester', 'Schedule.*', 'Major.*', 'Classroom.*', 'Teacher.*'),
    		'contain'=>array(
    			'Course'=>array(
    				'Teacher.name'),
    			'Schedule',
    			'Plan'),
    		'conditions'=>$conditions,
    		'recursive'=>2));
    	//debug($cursos);

    	$used_schedules = array();
    	for($indice = 0; $indice < sizeof($cursos); $indice++)
    	{
    		if(array_key_exists($cursos[$indice]['Schedule']['id'], $used_schedules) === false)
    		{
    			$used_schedules[$cursos[$indice]['Schedule']['id']] = $cursos[$indice]['Schedule']['id'];
    			$cursos[$indice]['color'] = 'Blue';
    		}
    		else
    		{
    			$cursos[$indice]['color'] = 'Red';
    		}

    		$cursos[$indice]['Teacher'] = $cursos[$indice]['Course']['Teacher'][0]['name'];
    		if(!empty($cursos[$indice]['Schedule']['ClassroomsSchedule'][0]['Classroom']))
    		{
    			$cursos[$indice]['Classroom'] = $cursos[$indice]['Schedule']['ClassroomsSchedule'][0]['Classroom']['location'].'-'.$cursos[$indice]['Schedule']['ClassroomsSchedule'][0]['Classroom']['number'];	
    		}
    		else
    		{
    			$cursos[$indice]['Classroom'] = null;	
    		}
    		
    		$cursos[$indice]['Semester'] = $cursos[$indice]['ClassroomsCoursesPlansSchedule']['semester'];
    		unset($cursos[$indice]['CoursesPlansSchedule']);
    		unset($cursos[$indice]['Schedule']['ClassroomsSchedule']); 
    		unset($cursos[$indice]['Course']['CoursesTeacher']);
    	}

    	//debug($cursos);
    	date_default_timezone_set('America/Monterrey');
    	
    	foreach($cursos as $curso)
    	{
    		

    		if($curso['Schedule']['lu'] == 1)
    		{
    			$inicio_stamp = strtotime("monday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    			//debug($inicio_stamp);
	    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
	    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
	    		$end_stamp = strtotime("monday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

	    		$data[] = array(
	    			'id'=>$curso['Course']['id'],
	    			'title'=>$curso['Course']['name'],
	    			'start'=>$inicio_stamp,
	    			'end'=>$end_stamp,
	    			'allDay'=>false,
	    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
	    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
	    				$curso['Plan']['plan_name']."</br>".
	    				$curso['Semester']."º Semestre</br>".
	    				$curso['Teacher']."</br>".
	    				$curso['Classroom'],
	    			'className'=>$curso['color'],
	    			'color'=>'red');
    		}

    		if($curso['Schedule']['ma'] == 1)
    		{
    			$inicio_stamp = strtotime("tuesday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    			//debug($inicio_stamp);
	    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
	    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
	    		$end_stamp = strtotime("tuesday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

	    		$data[] = array(
	    			'id'=>$curso['Course']['id'],
	    			'title'=>$curso['Course']['name'],
	    			'start'=>$inicio_stamp,
	    			'end'=>$end_stamp,
	    			'allDay'=>false,
	    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
	    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
	    				$curso['Plan']['plan_name']."</br>".
	    				$curso['Semester']."º Semestre</br>".
	    				$curso['Teacher']."</br>".
	    				$curso['Classroom'],
	    			'className'=>$curso['color'],
	    			'color'=>'red');
    		}

    		if($curso['Schedule']['mi'] == 1)
    		{
    			$inicio_stamp = strtotime("wednesday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    			//debug($inicio_stamp);
	    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
	    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
	    		$end_stamp = strtotime("wednesday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

	    		$data[] = array(
	    			'id'=>$curso['Course']['id'],
	    			'title'=>$curso['Course']['name'],
	    			'start'=>$inicio_stamp,
	    			'end'=>$end_stamp,
	    			'allDay'=>false,
	    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
	    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
	    				$curso['Plan']['plan_name']."</br>".
	    				$curso['Semester']."º Semestre</br>".
	    				$curso['Teacher']."</br>".
	    				$curso['Classroom'],
	    			'className'=>$curso['color'],
	    			'color'=>'red');
    		}

    		if($curso['Schedule']['ju'] == 1)
    		{
    			$inicio_stamp = strtotime("thursday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    			//debug($inicio_stamp);
	    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
	    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
	    		$end_stamp = strtotime("thursday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

	    		$data[] = array(
	    			'id'=>$curso['Course']['id'],
	    			'title'=>$curso['Course']['name'],
	    			'start'=>$inicio_stamp,
	    			'end'=>$end_stamp,
	    			'allDay'=>false,
	    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
	    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
	    				$curso['Plan']['plan_name']."</br>".
	    				$curso['Semester']."º Semestre</br>".
	    				$curso['Teacher']."</br>".
	    				$curso['Classroom'],
	    			'className'=>$curso['color'],
	    			'color'=>'red');
    		}

    		if($curso['Schedule']['vi'] == 1)
    		{
    			$inicio_stamp = strtotime("friday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    			//debug($inicio_stamp);
	    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
	    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
	    		$end_stamp = strtotime("friday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

	    		$data[] = array(
	    			'id'=>$curso['Course']['id'],
	    			'title'=>$curso['Course']['name'],
	    			'start'=>$inicio_stamp,
	    			'end'=>$end_stamp,
	    			'allDay'=>false,
	    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
	    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
	    				$curso['Plan']['plan_name']."</br>".
	    				$curso['Semester']."º Semestre</br>".
	    				$curso['Teacher']."</br>".
	    				$curso['Classroom'],
	    			'className'=>$curso['color'],
	    			'color'=>'red');
    		}

    		if($curso['Schedule']['sa'] == 1)
    		{
    			$inicio_stamp = strtotime("saturday 0 hours") + $curso['Schedule']['start_hr']*3600 + $curso['Schedule']['start_min'] * 60;
    			//debug($inicio_stamp);
	    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
	    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
	    		$end_stamp = strtotime("saturday 0 hours") + $curso['Schedule']['end_hr']*3600 + $curso['Schedule']['end_min'] * 60;

	    		$data[] = array(
	    			'id'=>$curso['Course']['id'],
	    			'title'=>$curso['Course']['name'],
	    			'start'=>$inicio_stamp,
	    			'end'=>$end_stamp,
	    			'allDay'=>false,
	    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
	    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."</br>".
	    				$curso['Plan']['plan_name']."</br>".
	    				$curso['Semester']."º Semestre</br>".
	    				$curso['Teacher']."</br>".
	    				$curso['Classroom'].' '.$curso['color'],
	    			'className'=>$curso['color'],
	    			'color'=>'red'
	    			);
    		}

    		/*
    		$inicio_stamp = strtotime("tuesday 0 hours") + $curso['Schedule'][0]['start_hr']*3600 + $curso['Schedule'][0]['start_min'] * 60;
    		//debug($inicio_stamp);
    		$test_tostr = gmdate("Y-m-d H:i:s ", $inicio_stamp);
    		//debug(gmdate("Y-m-d H:i:s ", $inicio_stamp));
    		$end_stamp = strtotime("tuesday 0 hours") + $curso['Schedule'][0]['end_hr']*3600 + $curso['Schedule'][0]['end_min'] * 60;

    		$data[] = array(
    			'id'=>$curso['Course']['id'],
    			'title'=>$curso['Course']['name'],
    			'start'=>$inicio_stamp,
    			'end'=>$end_stamp,
    			'allDay'=>false,
    			'url'=>Router::url('/').'courses/view/'.$curso['Course']['id'],
    			'details'=>$curso['Course']['code'].'-'.$curso['Course']['number']."\n".$curso['Plan'][0]['plan_name'],
    			'color'=>'blue');
    		*/

    	}
    	//debug($data);
    	//$this->Session->destroy('buscaPlan');
		$this->set("json", json_encode($data));
	}

        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	function update() {
		$vars = $this->params['url'];
		$this->Event->id = $vars['id'];
		$this->Event->saveField('start', $vars['start']);
		$this->Event->saveField('end', $vars['end']);
		$this->Event->saveField('all_day', $vars['allday']);
	}

}
?>
