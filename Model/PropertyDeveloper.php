<?php
App::uses('PropertiesAppModel', 'Properties.Model');
/**
 * PropertyDeveloper Model
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
class PropertyDeveloper extends PropertiesAppModel {

	public $name = 'PropertyDeveloper';

	public $validate = array(
		'name' => array('notempty')
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
            )
        );

	public $hasMany = array(
		'Property' => array(
			'className' => 'Properties.Property',
			'foreignKey' => 'developer_id',
			'dependent' => false
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
		parent::__construct($id, $table, $ds); // this order is imortant
	}

}