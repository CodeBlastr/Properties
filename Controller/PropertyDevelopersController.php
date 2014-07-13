<?php
App::uses('PropertiesAppController', 'Properties.Controller');
/**
 * Property Developers Controller
 *
 * Handles the logic for property developers.
 *
 * PHP versions 5
 *
 * Zuha(tm) : Business Management Applications (http://zuha.com)
 * Copyright 2009-2012, Zuha Foundation Inc. (http://zuha.org)
 *
 * Licensed under GPL v3 License
 * Must retain the above copyright notice and release modifications publicly.
 *
 * @copyright     Copyright 2009-2012, Zuha Foundation Inc. (http://zuha.com)
 * @link          http://zuha.com Zuha� Project
 * @package       zuha
 * @subpackage    zuha.app.plugins.properties
 * @since         Zuha(tm) v 0.0.1
 * @license       GPL v3 License (http://www.gnu.org/licenses/gpl.html) and Future Versions
 * @property Property PropertyDeveloper
 */
class AppPropertyDevelopersController extends PropertiesAppController {

/**
 * Name
 *
 * @var string
 */
	public $name = 'PropertyDevelopers';

/**
 * Uses
 *
 * @var string
 */
	public $uses = array(
		'Properties.PropertyDeveloper'
		);

/**
 * Index method.
 *
 * @param void
 * @return void
 */
	public function index() {
		$this->set('propertyDevelopers', $this->request->data = $this->paginate());
		return $this->request->data;
	}

/**
 * View method
 * 
 */
	public function view($id = null) {
		$this->PropertyDeveloper->id = $id;
		if (!$this->PropertyDeveloper->exists()) {
			throw new NotFoundException(__('Invalid developer'));
		}
		$this->set('propertyDeveloper', $this->request->data = $this->PropertyDeveloper->find('first' , array(
			'conditions' => array(
				'PropertyDeveloper.id' => $id
				),
			'contain' => array(
				'Property'
				)
			)));
        return $this->request->data;
	}

/**
 * Add a property
 * 
 */
    public function add($ownerId = null) {
    	if ($this->request->is('post')) {
			if ($this->PropertyDeveloper->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Developer saved'));
				$this->redirect(array('action' => 'view', $this->PropertyDeveloper->id));
            } 
		}
		$this->set('ownerId', !empty($ownerId) ? $ownerId : $this->Session->read('Auth.User.id')); 
		$this->set('page_title_for_layout', __('Create a Property Developer'));
		$this->set('title_for_layout', __('Create a Property Developer'));
    }

    
/**
 * Edit method
 *
 * @access public
 * @param type $id
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$this->PropertyDeveloper->id = $id;
		if (!$this->PropertyDeveloper->exists()) {
			throw new NotFoundException(__('Invalid developer'));
		}
		if ($this->request->is('put') || $this->request->is('post')) {
			if ($this->PropertyDeveloper->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Developer saved'));
				if (isset($this->request->data['SaveAndContinue'])) {
					$this->redirect(array('action' => 'edit', $this->PropertyDeveloper->id));
				} else {
					$this->redirect(array('action' => 'view', $this->PropertyDeveloper->id, 'admin' => false));
				}
            }
		} else {
	        $this->request->data = $this->PropertyDeveloper->find('first', array(
	            'conditions' => array(
	                'PropertyDeveloper.id' => $id
	                )
				));
		}
       	$this->set('page_title_for_layout', __('Edit %s ', $this->request->data['PropertyDeveloper']['name']));
		$this->set('title_for_layout', __('Edit %s ', $this->request->data['PropertyDeveloper']['name']));
	}

/**
 * Delete method
 * 
 * @param string $id
 */
	public function delete($id = null) {
		// if (!$this->request->is('post')) {
			// throw new MethodNotAllowedException();
		// }
		$this->PropertyDeveloper->id = $id;
		if (!$this->PropertyDeveloper->exists()) {
			throw new NotFoundException(__('Invalid developer'));
		}
		if ($this->PropertyDeveloper->delete()) {
			$this->Session->setFlash(__('Deleted'), 'flash_success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Error deleting, please try again.'), 'flash_warning');
		$this->redirect(array('action' => 'index'));
	}

/**
 * My method
 * 
 */
	public function my() {
		if (empty($this->userId)) {
			$this->redirect(array('action' => 'add'));
		}
		$this->set('propertyDeveloper', $this->request->data = $this->PropertyDeveloper->find('first' , array(
			'conditions' => array(
				'PropertyDeveloper.owner_id' => $this->userId
				),
			'contain' => array(
				'Property'
				)
			)));
        return $this->request->data;
	}

}

if (!isset($refuseInit)) {
	class PropertyDevelopersController extends AppPropertyDevelopersController {
	}

}