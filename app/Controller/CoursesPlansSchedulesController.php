<?php
App::uses('AppController', 'Controller');
/**
 * CoursesPlansSchedules Controller
 *
 * @property CoursesPlansSchedule $CoursesPlansSchedule
 * @property PaginatorComponent $Paginator
 */
class CoursesPlansSchedulesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CoursesPlansSchedule->recursive = 0;
		$this->set('coursesPlansSchedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoursesPlansSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid courses plans schedule'));
		}
		$options = array('conditions' => array('CoursesPlansSchedule.' . $this->CoursesPlansSchedule->primaryKey => $id));
		$this->set('coursesPlansSchedule', $this->CoursesPlansSchedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CoursesPlansSchedule->create();
			if ($this->CoursesPlansSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The courses plans schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courses plans schedule could not be saved. Please, try again.'));
			}
		}
		$courses = $this->CoursesPlansSchedule->Course->find('list');
		$plans = $this->CoursesPlansSchedule->Plan->find('list');
		$schedules = $this->CoursesPlansSchedule->Schedule->find('list');
		$this->set(compact('courses', 'plans', 'schedules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CoursesPlansSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid courses plans schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CoursesPlansSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The courses plans schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courses plans schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CoursesPlansSchedule.' . $this->CoursesPlansSchedule->primaryKey => $id));
			$this->request->data = $this->CoursesPlansSchedule->find('first', $options);
		}
		$courses = $this->CoursesPlansSchedule->Course->find('list');
		$plans = $this->CoursesPlansSchedule->Plan->find('list');
		$schedules = $this->CoursesPlansSchedule->Schedule->find('list');
		$this->set(compact('courses', 'plans', 'schedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CoursesPlansSchedule->id = $id;
		if (!$this->CoursesPlansSchedule->exists()) {
			throw new NotFoundException(__('Invalid courses plans schedule'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CoursesPlansSchedule->delete()) {
			$this->Session->setFlash(__('The courses plans schedule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The courses plans schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
