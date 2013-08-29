<?php
App::uses('PropertiesAppModel', 'Properties.Model');
/**
 * Property Model
 *
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
 * @subpackage    zuha.app.plugins.properties.models
 * @since         Zuha(tm) v 0.0.1
 * @license       GPL v3 License (http://www.gnu.org/licenses/gpl.html) and Future Versions
 */
class Property extends PropertiesAppModel {

	public $name = 'Property';

	public $validate = array(
		'name' => array('notempty'),
		'price' => array('notempty'),
        );

	public $order = '';

	public $hasOne = array(
		'Gallery' => array(
			'className' => 'Galleries.Gallery',
			'foreignKey' => 'foreign_key',
			'dependent' => true,
			'conditions' => array('Gallery.model' => 'Property'),
			'fields' => '',
			'order' => ''
            )
        );

	//properties association.
	public $belongsTo = array(
		'Owner' => array(
			'className' => 'Users.User',
			'foreignKey' => 'owner_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
            ),
        );
    
	public function __construct($id = null, $table = null, $ds = null) {		
		if (in_array('Categories', CakePlugin::loaded())) {
			$this->hasAndBelongsToMany['Category'] = array(
	            'className' => 'Categories.Category',
	       		'joinTable' => 'categorized',
	            'foreignKey' => 'foreign_key',
	            'associationForeignKey' => 'category_id',
	    		'conditions' => 'Categorized.model = "Property"',
	    		// 'unique' => true,
	            );
			$this->actsAs['Categories.Categorizable'] = array('modelAlias' => 'Property');
		}
		if (in_array('Maps', CakePlugin::loaded())) {
			// address field is in use in canopy, make sure it works there if changing the field name
			/** @see MapableBehavior::beforeSave() **/
			$this->actsAs['Maps.Mapable'] = array('modelAlias' => 'Property', 'addressField' => 'location');
		}
		
		parent::__construct($id, $table, $ds); // this order is imortant
		
		$this->categorizedParams = array('conditions' => array($this->alias.'.parent_id' => null));
		$this->order = array($this->alias . '.' . 'price');
	}
    
/**
 * Before save callback
 * 
 * @param type $options
 * @return boolean
 */
    public function beforeSave($options = array()) {
        $this->Behaviors->attach('Galleries.Mediable'); // attaching the gallery behavior here, because that's how it was in Products
		$this->data = $this->_cleanAddData($this->data);
        return parent::beforeSave($options);
    }

/**
 * Cleans data for saving
 *
 * @access protected
 * @param array
 * @return array
 */
 	protected function _cleanAddData($data) {
        if (empty($data['GalleryImage']['filename']['name'])) {
            unset($data['GalleryImage']);
        }
		return $data;
	}	
}