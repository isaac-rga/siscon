<?php
App::uses('AppModel', 'Model');
/**
 * Plan Model
 *
 * @property Major $Major
 * @property ClassroomsCoursesPlansSchedule $ClassroomsCoursesPlansSchedule
 */
class Plan extends AppModel {



	public $displayField = 'plan_name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Major' => array(
			'className' => 'Major',
			'foreignKey' => 'major_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ClassroomsCoursesPlansSchedule' => array(
			'className' => 'ClassroomsCoursesPlansSchedule',
			'foreignKey' => 'plan_id',
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
