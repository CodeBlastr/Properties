<?php 
class PropertiesSchema extends CakeSchema {

	public $renames = array();

	public function before($event = array()) {
	    $db = ConnectionManager::getDataSource('default');
	    $db->cacheSources = false;
		App::uses('UpdateSchema', 'Model'); 
		$this->UpdateSchema = new UpdateSchema;
		$before = $this->UpdateSchema->before($event);
		return $before;
	}

	public function after($event = array()) {
		$this->_installData($event);
		$this->UpdateSchema->rename($event, $this->renames);
		$this->UpdateSchema->after($event);
	}

	public $properties = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mls' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'summary' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_public' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'is_featured' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'is_showcased' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'cost' => array('type' => 'float', 'null' => true, 'default' => null),
		'price' => array('type' => 'float', 'null' => true, 'default' => null),
		'price_min' => array('type' => 'float', 'null' => true, 'default' => null),
		'price_max' => array('type' => 'float', 'null' => true, 'default' => null),
		'location' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'parking_options' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'permit_office' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bedrooms' => array('type' => 'float', 'null' => true, 'default' => null),
		'bathrooms' => array('type' => 'float', 'null' => true, 'default' => null),
		'footage' => array('type' => 'float', 'null' => true, 'default' => null),
		'acres' => array('type' => 'float', 'null' => true, 'default' => null),
		'order' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'started' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'ended' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'search_tags' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comparables' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'developer_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'owner_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'creator_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modifier_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'SEARCH_TAGS' => array('column' => 'search_tags', 'type' => 'fulltext')),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	public $property_developers = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'owner_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'creator_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modifier_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);
	
/**
 * Install Data Method
 * 
 * @param string $event
 */
	protected function _installData($event) {
		if (isset($event['create'])) {
			switch ($event['create']) {
	            case 'properties':
	                $Model = ClassRegistry::init('Properties.Property');
					$Model->create();
					$Model->saveAll(array(
						'Property' => array(
							'mls' => 'M57290',
							'name' => '20 Acre Palatial Estate',
							'summary' => 'No, no I didnt. Unless... you consider "World\'s Coolest Daddy" a job. I\'m looking for something that says "Dad likes leather". O-kay.',
							'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. nulla varius, lectus vulputate accumsan dapibus, mauris tortor ullamcorper dolor, pellentesque pulvinar tellus neque sit amet sapien. Nunc non dapibus tellus. Etiam luctus velit eget tellus vestibulum, sagittis faucibus erat aliquet. Curabitur fermentum massa dapibus auctor elementum. Cras feugiat semper accumsan. Aenean fringilla ut ipsum quis molestie. In ultrices massa risus, vitae dictum dui porttitor at. Aliquam erat volutpat. Integer mattis, neque varius pharetra cursus, neque lacus adipiscing massa, id mollis urna tortor eget risus. Aliquam blandit ipsum id scelerisque auctor.',
							'is_public' => '1',
							'cost' => '0.00',
							'price' => '195000',
							'location' => '456 Park Blvd San Diego CA 92101',
							'bedrooms' => '4',
							'bathrooms' => '3.5',
							'footage' => '7500',
							'acres' => '20',
							'order' => '0',
							'started' => date('Y-m-d h:i:s'),
							'ended' => null,
							'search_tags' => 'california estate mansion big waterfront',
							'owner_id' => 1,
							'creator_id' => 1,
							'modifier_id' => 1,
							'created' => date('Y-m-d h:i:s'),
							'modified' => date('Y-m-d h:i:s'),
		
						)
					));
				break;
			}
		}
	}
}
