<?php
App::uses('AppController', 'Controller');
/**
 * Majors Controller
 *
 * @property Major $Major
 */
class MajorsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Major->recursive = 0;
		$this->set('majors', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Major->id = $id;
		if (!$this->Major->exists()) {
			throw new NotFoundException(__('Invalid major'));
		}
		$this->set('major', $this->Major->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Major->create();
			if ($this->Major->save($this->request->data)) {
				$this->Session->setFlash(__('The major has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The major could not be saved. Please, try again.'));
			}
		}
		$departments = $this->Major->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Major->id = $id;
		if (!$this->Major->exists()) {
			throw new NotFoundException(__('Invalid major'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Major->save($this->request->data)) {
				$this->Session->setFlash(__('The major has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The major could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Major->read(null, $id);
		}
		$departments = $this->Major->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Major->id = $id;
		if (!$this->Major->exists()) {
			throw new NotFoundException(__('Invalid major'));
		}
		if ($this->Major->delete()) {
			$this->Session->setFlash(__('Major deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Major was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
