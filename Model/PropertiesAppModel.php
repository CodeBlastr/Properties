<?php
App::uses('AppModel', 'Model');
/**
 * Properties App Model
 *
 *
 * PHP versions 5.3
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
 * @subpackage    zuha.app.plugins.properties.model
 * @since         Zuha(tm) v 0.0.1
 * @license       GPL v3 License (http://www.gnu.org/licenses/gpl.html) and Future Versions
 */

class PropertiesAppModel extends AppModel {
	
/**
 * Menu Init method
 * Used by WebpageMenuItem to initialize when someone creates a new menu item for the users plugin.
 * 
 */
 	public function menuInit($data = null) {
 		App::uses('Property', 'Properties.Model');
		$Property = new Property;
		$property = $Property->find('first');
		if (!empty($property)) {
	 		// link to properties index and first property
			$data['WebpageMenuItem']['item_url'] = '/properties/properties/index';
			$data['WebpageMenuItem']['item_text'] = 'Property List';
			$data['WebpageMenuItem']['name'] = 'Property List';
			$data['ChildMenuItem'] = array(
				array(
					'name' => $property['Property']['name'],
					'item_text' => $property['Property']['name'],
					'item_url' => '/properties/properties/view/'.$property['Property']['id']
				)
			);
		}
 		return $data;
 	}

}