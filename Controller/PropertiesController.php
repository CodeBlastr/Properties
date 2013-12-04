<?php
App::uses('PropertiesAppController', 'Properties.Controller');
/**
 * Properties Controller
 *
 * Handles the logic for properties.
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
 */
class PropertiesController extends PropertiesAppController {

/**
 * Name
 *
 * @var string
 */
	public $name = 'Properties';

/**
 * Uses
 *
 * @var string
 */
	public $uses = 'Properties.Property';
	

/**
 * Properties dashboard.
 *
 */
	public function dashboard(){
        $Transaction = ClassRegistry::init('Transactions.Transaction');
        $TransactionItem = ClassRegistry::init('Transactions.TransactionItem');
        $this->set('counts', $counts = array_count_values(Set::extract('/Transaction/status', $Transaction->find('all'))));
		$this->set('statsSalesToday', $Transaction->salesStats('today'));
		$this->set('statsSalesThisWeek', $Transaction->salesStats('thisWeek'));
		$this->set('statsSalesThisMonth', $Transaction->salesStats('thisMonth'));
		$this->set('statsSalesThisYear', $Transaction->salesStats('thisYear'));
		$this->set('statsSalesAllTime', $Transaction->salesStats('allTime'));
		$this->set('transactionStatuses', $Transaction->statuses());
		$this->set('itemStatuses', $TransactionItem->statuses());
		$this->set('title_for_layout', __('Ecommerce Dashboard'));
		$this->set('page_title_for_layout', __('Ecommerce Dashboard'));
        $this->layout = 'default';
	}

/**
 * Index method.
 *
 * @param void
 * @return void
 */
	public function index() {		
		$this->set('properties', $this->request->data = $this->paginate());
		return $this->request->data;
	}

/**
 * Category method.
 *
 * @param void
 * @return void
 */
	public function category($categoryId = null) {
		if (!empty($categoryId)) {
			$this->paginate['joins'] = array(array(
				'table' => 'categorized',
				'alias' => 'Categorized',
				'type' => 'INNER',
				'conditions' => array(
					"Categorized.foreign_key = Property.id",
					"Categorized.model = 'Property'",
					"Categorized.category_id = '{$categoryId}'",
				),
			));
			$this->paginate['contain'][] = 'Category';
		} 
		$this->view = 'index';
		return $this->index();
	}


/**
 * View method
 * 
 */
	public function view($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid Property'));
		}
              
		$property = $this->Property->find('first' , array(
			'conditions' => array(
				'Property.id' => $id
				)
			));
			
		$this->set('property', $this->request->data = $this->Property->find('first' , array(
			'conditions' => array(
				'Property.id' => $id
				)
			)));
        $this->set('title_for_layout', $this->request->data['Property']['name']);
        return $this->request->data;
	}   

/**
 * Add a property
 * 
 */
    public function add() {
    	if (!empty($this->request->data)) {
			if ($this->Property->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Property saved.'));
				$this->redirect(array('action' => 'edit', $this->Property->id));
            } 
		}
    	if (in_array('Categories', CakePlugin::loaded())) {
        	$this->set('categories', $this->Property->Category->generateTreeList());
		}
		$this->set('page_title_for_layout', __('Create a Property'));
		$this->set('title_for_layout', __('Add Property Form'));
        $this->layout = 'default';
    }

    
/**
 * Edit method
 *
 * @access public
 * @param type $id
 * @throws NotFoundException
 */
	public function edit($id = null) {
		$this->redirect('admin');
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		
		if (!empty($this->request->data)) {
			if ($this->Property->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Property saved.'));
				if (isset($this->request->data['SaveAndContinue'])) {
					$this->redirect(array('action' => 'edit', $this->Property->id));
				} else {
					$this->redirect(array('action' => 'view', $this->Property->id));
				}
            }
		} else {
	        $this->request->data = $this->Property->find('first', array(
	            'conditions' => array(
	                'Property.id' => $id
	                )
				));
		}
		if (CakePlugin::loaded('Categories')) {
	        $this->set('categories', $this->Property->Category->generateTreeList());
			$selectedCategories = $this->Property->Category->Categorized->find('all', array(
				'conditions' => array(
					'Categorized.model'=>$this->Property->alias,
					'Categorized.foreign_key'=>$this->Property->id
					),
				'contain' => array('Category')
				));
			$this->set('selectedCategories',  Set::extract($selectedCategories, '/Category/id'));
		}
       	$this->set('page_title_for_layout', __('Edit %s ', $this->request->data['Property']['name']));
		$this->set('title_for_layout', __('Edit %s ', $this->request->data['Property']['name']));
	}

/**
 * Delete method
 * 
 * @param string $id
 */
	public function delete($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		debug('this needs to be post only, fix');
		break;
	}
    
/**
 * Categories method
 * 
 */
    public function categories() {
        if (!empty($this->request->data['Category'])) {
            if ($this->Property->Category->save($this->request->data)) {
                $this->Session->setFlash(__('Category saved'));
            }
        }

        $this->set('categories', $categories = $this->Property->Category->find('threaded'));
        $this->set('parentCategories', Set::combine($categories, '{n}.Category.id', '{n}.Category.name'));
        $this->set('page_title_for_layout', __('Property Categories'));
		$this->layout = 'default';
    }
}