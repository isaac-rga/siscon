<?php
App::uses('AppModel', 'Model');
/**
 * Course Model
 *
 * @property CoursesTeacher $CoursesTeacher
 * @property ClassroomsCoursesPlansSchedule $ClassroomsCoursesPlansSchedule
 */
class Course extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ClassroomsCoursesPlansSchedule' => array(
			'className' => 'ClassroomsCoursesPlansSchedule',
			'foreignKey' => 'course_id',
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

	public $hasAndBelongsToMany = array(
		'Teacher' => array(
			'className' => 'Teacher',
			'joinTable' => 'courses_teachers',
			'foreignKey' => 'course_id',
			'associationForeignKey' => 'teacher_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
