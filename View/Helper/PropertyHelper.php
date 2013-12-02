<?php
/**
 * Property helper
 *
 * @package 	properties
 * @subpackage 	properties.views.helpers
 */
class PropertyHelper extends AppHelper {

/**
 * helpers variable
 *
 * @var array
 */
	public $helpers = array ('Html', 'Form', 'Js' => 'Jquery');

/**
 * Constructor method
 * 
 */
    public function __construct(View $View, $settings = array()) {
    	$this->View = $View;
    	//$this->defaults = array_merge($this->defaults, $settings);
		parent::__construct($View, $settings);
		App::uses('Property', 'Properties.Model');
		$this->Property = new Property();
    }

/**
 * Find method
 */
 	public function find($type = 'first', $params = array()) {
 		return $this->Property->find($type, $params);
 	}

/**
 * Lone Carousel
 * 
 */
 	public function loneCarousel() {
 		return 'hello';
 	}

}