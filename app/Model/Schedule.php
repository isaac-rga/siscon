<?php
App::uses('AppModel', 'Model');
/**
 * Schedule Model
 *
 * @property ClassroomsCoursesPlansSchedules $ClassroomsCoursesPlansSchedules
 */
class Schedule extends AppModel {

	public $virtualFields = array(
		'horario' => "CONCAT(Schedule.start_hr, ':', Schedule.start_min,' - ', Schedule.end_hr,':',Schedule.end_min)"
	);

	public $displayField = 'horario';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ClassroomsCoursesPlansSchedules' => array(
			'className' => 'ClassroomsCoursesPlansSchedules',
			'foreignKey' => 'schedule_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
