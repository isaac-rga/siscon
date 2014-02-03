<?php
App::uses('AppModel', 'Model');
/**
 * Classroom Model
 *
 * @property ClassroomsCoursesPlansSchedule $ClassroomsCoursesPlansSchedule
 */
class Classroom extends AppModel {

	public $virtualFields = array(
		'salon'=>"CONCAT(Classroom.location,' - ',Classroom.number)");

	public $displayField = 'salon';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ClassroomsCoursesPlansSchedule' => array(
			'className' => 'ClassroomsCoursesPlansSchedule',
			'foreignKey' => 'classroom_id',
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
