<?php
App::uses('AppController', 'Controller');
/**
 * ClassroomsCoursesPlansSchedules Controller
 *
 * @property ClassroomsCoursesPlansSchedule $ClassroomsCoursesPlansSchedule
 * @property PaginatorComponent $Paginator
 */
class ClassroomsCoursesPlansSchedulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClassroomsCoursesPlansSchedule->recursive = 0;
		$this->set('classroomsCoursesPlansSchedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClassroomsCoursesPlansSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid classrooms courses plans schedule'));
		}
		$options = array('conditions' => array('ClassroomsCoursesPlansSchedule.' . $this->ClassroomsCoursesPlansSchedule->primaryKey => $id));
		$this->set('classroomsCoursesPlansSchedule', $this->ClassroomsCoursesPlansSchedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClassroomsCoursesPlansSchedule->create();
			if ($this->ClassroomsCoursesPlansSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The classrooms courses plans schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classrooms courses plans schedule could not be saved. Please, try again.'));
			}
		}
		$courses = $this->ClassroomsCoursesPlansSchedule->Course->find('list');
		$plans = $this->ClassroomsCoursesPlansSchedule->Plan->find('list');
		$classrooms = $this->ClassroomsCoursesPlansSchedule->Classroom->find('list');
		$schedules = $this->ClassroomsCoursesPlansSchedule->Schedule->find('list');
		$this->set(compact('courses', 'plans', 'classrooms', 'schedules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClassroomsCoursesPlansSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid classrooms courses plans schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClassroomsCoursesPlansSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The classrooms courses plans schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classrooms courses plans schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClassroomsCoursesPlansSchedule.' . $this->ClassroomsCoursesPlansSchedule->primaryKey => $id));
			$this->request->data = $this->ClassroomsCoursesPlansSchedule->find('first', $options);
		}
		$courses = $this->ClassroomsCoursesPlansSchedule->Course->find('list');
		$plans = $this->ClassroomsCoursesPlansSchedule->Plan->find('list');
		$classrooms = $this->ClassroomsCoursesPlansSchedule->Classroom->find('list');
		$schedules = $this->ClassroomsCoursesPlansSchedule->Schedule->find('list');
		$this->set(compact('courses', 'plans', 'classrooms', 'schedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClassroomsCoursesPlansSchedule->id = $id;
		if (!$this->ClassroomsCoursesPlansSchedule->exists()) {
			throw new NotFoundException(__('Invalid classrooms courses plans schedule'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClassroomsCoursesPlansSchedule->delete()) {
			$this->Session->setFlash(__('The classrooms courses plans schedule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The classrooms courses plans schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
