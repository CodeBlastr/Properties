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
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mls' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'summary' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'is_public' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'cost' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'price' => array('type' => 'float', 'null' => true, 'default' => NULL),
		'location' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bedrooms' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bathrooms' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'footage' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'acres' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'started' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'ended' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'search_tags' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'owner_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'creator_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modifier_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'SEARCH_TAGS' => array('column' => 'search_tags', 'type' => 'fulltext')),
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
							'description' => 'Okay, Lindsay, are you forgetting that I was a professional twice over - an analyst and a therapist. The world\'s first analrapist. I\'m living up here and if you tell anyone about this, I will fucking kill you. Ah, stop licking my hand, you horse\'s ass. I blue myself. Whoa, this guy\'s straight? Chanukah can be spelled so many ways. Oh God. Sorry, some of my students are arguing the significance of the shankbone on the seder plate. But we do not - not wag our genitals at one another to make a point. I blue myself. I blue myself. ... even if it means me taking a chubby, I will suck it up. Faith is a fact. No, faith is a facet. I almost said faith is a fact. You mean... Leather Daddy? You baited the balcony? Michael, you are not quite the ladies man I had pictured. Hopefully, we will remedy that when we are in the spa spreading body chocolate on each other. Never hire Tobias Funke. Okay, Lindsay, are you forgetting that I was a professional twice over - an analyst and a therapist. The world\'s first analrapist. Michael, you are quite the cupid. You can stick an arrow in my buttocks any time. Never hire Tobias Funke. Hey, I\'m fucking Lucille 2. I wouldn\'t mind kissing that man between the cheeks. I blue myself. So fill each one of these bags with some glitter, my photo resume, some candy, and a note. Bad news. Andy',
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
