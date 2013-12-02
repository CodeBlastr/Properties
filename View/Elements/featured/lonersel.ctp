<?php 
$this->Property = $this->Helpers->load('Properties.Property', 'Media.Media');
$property = $this->Property->find('first', array('conditions' => array('Property.is_featured' => 1), 'order' => array('Property.created'), 'limit' => 1));
echo $this->element('Media.carousels/default', array('data' => $property));
