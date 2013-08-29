<?php
		
echo $this->element('properties');

// set the contextual sorting items
$this->set('forms_sort', array(
    'type' => 'select',
    'sorter' => array(array(
            'heading' => '',
            'items' => array(
                $this->Paginator->sort('price'),
                $this->Paginator->sort('name'),
            )
    )),
));
// set contextual search options
$this->set('forms_search', array(
    'url' => '/properties/properties/index/', 
	'inputs' => array(
		array(
			'name' => 'contains:search_tags', 
			'options' => array(
				'label' => '', 
				'placeholder' => 'Property Search',
				'value' => !empty($this->request->params['named']['contains']) ? substr($this->request->params['named']['contains'], strpos($this->request->params['named']['contains'], ':') + 1) : null,
				)
			),
		)
	));
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
        array(
            'heading' => 'Property',
            'items' => array(
                $this->Html->link(__('List'), array('controller' => 'properties', 'action' => 'index')),
                $this->Html->link(__('Add'), array('controller' => 'properties', 'action' => 'add')),
            )
        ),
        ))); ?>
