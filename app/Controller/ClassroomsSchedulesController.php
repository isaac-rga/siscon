<?php
App::uses('AppController', 'Controller');
/**
 * ClassroomsSchedules Controller
 *
 * @property ClassroomsSchedule $ClassroomsSchedule
 * @property PaginatorComponent $Paginator
 */
class ClassroomsSchedulesController extends AppController {

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
		$this->ClassroomsSchedule->recursive = 0;
		$this->set('classroomsSchedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClassroomsSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid classrooms schedule'));
		}
		$options = array('conditions' => array('ClassroomsSchedule.' . $this->ClassroomsSchedule->primaryKey => $id));
		$this->set('classroomsSchedule', $this->ClassroomsSchedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClassroomsSchedule->create();
			if ($this->ClassroomsSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The classrooms schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classrooms schedule could not be saved. Please, try again.'));
			}
		}
		$classrooms = $this->ClassroomsSchedule->Classroom->find('list');
		$schedules = $this->ClassroomsSchedule->Schedule->find('list');
		$this->set(compact('classrooms', 'schedules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClassroomsSchedule->exists($id)) {
			throw new NotFoundException(__('Invalid classrooms schedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClassroomsSchedule->save($this->request->data)) {
				$this->Session->setFlash(__('The classrooms schedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classrooms schedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClassroomsSchedule.' . $this->ClassroomsSchedule->primaryKey => $id));
			$this->request->data = $this->ClassroomsSchedule->find('first', $options);
		}
		$classrooms = $this->ClassroomsSchedule->Classroom->find('list');
		$schedules = $this->ClassroomsSchedule->Schedule->find('list');
		$this->set(compact('classrooms', 'schedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClassroomsSchedule->id = $id;
		if (!$this->ClassroomsSchedule->exists()) {
			throw new NotFoundException(__('Invalid classrooms schedule'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ClassroomsSchedule->delete()) {
			$this->Session->setFlash(__('The classrooms schedule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The classrooms schedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
