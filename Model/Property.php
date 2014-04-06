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
class AppProperty extends PropertiesAppModel {

	public $name = 'Property';
		
	public $validate = array(
		'name' => array(
			'name' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'price' => array(
				'rule' => array('notempty'),
				'message' => 'Pricing required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

 /**
  * Acts as
  * 
  * @var array
  */
    public $actsAs = array(
     	'Metable',
		);

	public $belongsTo = array(
		'Owner' => array(
			'className' => 'Users.User',
			'foreignKey' => 'owner_id'
            ),
		'PropertyDeveloper' => array(
			'className' => 'Properties.PropertyDeveloper',
			'foreignKey' => 'developer_id'
            ),
        );

	public $hasMany = array(
		'Comparable' => array(
			'className' => 'Properties.Property',
			'foreignKey' => false,
			'conditions' => array('Comparable.comparables LIKE CONCAT("%", {$__cakeID__$} ,"%")')
			)
		);
    
/**
 * Constructor
 * 
 */
	public function __construct($id = null, $table = null, $ds = null) {
		if(CakePlugin::loaded('Media')) {
			$this->actsAs[] = 'Media.MediaAttachable';
		}
		if (CakePlugin::loaded('Categories')) {
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
		if (CakePlugin::loaded('Maps')) {
			// address field is in use in canopy, make sure it works there if changing the field name
			/** @see MapableBehavior::beforeSave() **/
			$this->actsAs['Maps.Mapable'] = array('modelAlias' => 'Property', 'addressField' => 'location', 'searchTagsField' => 'search_tags');
		}
		parent::__construct($id, $table, $ds); // this order is imortant
		
		$this->categorizedParams = array('conditions' => array($this->alias.'.parent_id' => null));
		$this->order = array($this->alias . '.' . 'price');
	}

}

if (!isset($refuseInit)) {
	class Property extends AppProperty {
	}

}