<?php
/*
 * Controller/FullCalendarController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class FullCalendarController extends FullCalendarAppController {

	var $name = 'FullCalendar';

	public $helpers = array('Js' => array('Jquery'));
	var $components = array('RequestHandler', 'Session');
	var $uses = array('FullCalendar', 'Plan', 'Major');

	

	function index() 
	{
		
		if(!empty($this->request->data))
		{
			//s$this->Session->setFlash('Hay datos!');
			//debug($this->request->data);
			$this->Session->write('buscaPlan', $this->request->data);
			//$this->Session->write('buscaPlan', 'Hola como estas');
			$sesion_g = $this->Session->read('buscaPlan');
			//debug($sesion_g);
		}
		/*$sesion_plan = $this->Session->read('buscaPlan');
		if(!empty($sesion_plan))
		{
			debug($sesion_plan);
		}*/
		

		$majors_raw = $this->Major->find('all', array(
			'fields'=>array('id', 'major_siglas', 'major_name'),
			'recursive' => -1));
		//debug($majors_raw);
		foreach($majors_raw as $mr)
		{
			$majors[$mr['Major']['id']] = $mr['Major']['major_siglas']/*.' - '.$mr['Major']['major_name']*/;
		}
		//debug($majors);
		$this->set('majors', $majors);

		$plans = $this->Plan->find('all', array(
			'recursive' => -1));
		//debug($plans);
	}

	function escogePlan()
	{
		if($this->RequestHandler->isAjax())
		{
			//debug($this->request->data);
			if(!empty($this->request->data))
			{
				$data = $this->request->data['searchPlan']['Major'];
				$planes_raw = $this->Plan->find('all', array(
					'fields'=>array(
						'id', 'plan_name'),
					'conditions'=>array(
						'major_id'=>$data,
						'active'=>1),
					'order'=>array('Plan.id ASC'),
					'recursive'=> -1));
				//debug($planes_raw);
				foreach($planes_raw as $pr)
				{
					$planes[$pr['Plan']['id']] = $pr['Plan']['plan_name'];
				}
				//debug($planes);
				$this->set('planes', $planes);
			}
			
		}
		
	}

	function buscaPlan()
	{
		//debug($this->request->data);
		$this->Session->write('buscaPlan', $this->request->data);
		$this->redirect(array('index'));
	}

}
?>
