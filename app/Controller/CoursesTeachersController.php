<?php
App::uses('AppController', 'Controller');
/**
 * CoursesTeachers Controller
 *
 * @property CoursesTeacher $CoursesTeacher
 * @property PaginatorComponent $Paginator
 */
class CoursesTeachersController extends AppController {

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
		$this->CoursesTeacher->recursive = 0;
		$this->set('coursesTeachers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CoursesTeacher->exists($id)) {
			throw new NotFoundException(__('Invalid courses teacher'));
		}
		$options = array('conditions' => array('CoursesTeacher.' . $this->CoursesTeacher->primaryKey => $id));
		$this->set('coursesTeacher', $this->CoursesTeacher->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CoursesTeacher->create();
			if ($this->CoursesTeacher->save($this->request->data)) {
				$this->Session->setFlash(__('The courses teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courses teacher could not be saved. Please, try again.'));
			}
		}
		$courses = $this->CoursesTeacher->Course->find('list');
		$teachers = $this->CoursesTeacher->Teacher->find('list');
		$this->set(compact('courses', 'teachers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CoursesTeacher->exists($id)) {
			throw new NotFoundException(__('Invalid courses teacher'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CoursesTeacher->save($this->request->data)) {
				$this->Session->setFlash(__('The courses teacher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courses teacher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CoursesTeacher.' . $this->CoursesTeacher->primaryKey => $id));
			$this->request->data = $this->CoursesTeacher->find('first', $options);
		}
		$courses = $this->CoursesTeacher->Course->find('list');
		$teachers = $this->CoursesTeacher->Teacher->find('list');
		$this->set(compact('courses', 'teachers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CoursesTeacher->id = $id;
		if (!$this->CoursesTeacher->exists()) {
			throw new NotFoundException(__('Invalid courses teacher'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CoursesTeacher->delete()) {
			$this->Session->setFlash(__('The courses teacher has been deleted.'));
		} else {
			$this->Session->setFlash(__('The courses teacher could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
