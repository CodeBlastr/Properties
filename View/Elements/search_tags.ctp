<?php
// first used on joujou  (copy to the sites dir if making more abstract)
echo $this->Element('forms/search', array(
	'formsSearch' => array(
		'url' => '/properties/properties/index/'
		), 
	'inputs' => array(
		array(
			'name' => 'contains:search_tags', 
			'options' => array(
				'class' => 'properties search', 
				'placeholder' => 'Search by address or zip code',
				'after' => '<button id="search-button" type="submit"></button>'
				)
			)
		)
	)); ?>