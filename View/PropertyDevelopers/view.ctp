<div class="property view row">
	<h2><?php echo $propertyDeveloper['PropertyDeveloper']['name']; ?></h2>
	<?php echo $propertyDeveloper['PropertyDeveloper']['description']; ?>
</div>

<?php //echo $this->element('mapped', array('locations' => $properties, 'mapHeight' => '400px', 'mapZoom' => 11, 'autoZoomMultiple' => true), array('plugin' => 'maps')); ?>

<?php
// set contextual search options
$this->set('formsSearch', array(
    'url' => '/properties/property_developers/index/', 
	'inputs' => array(
		array(
			'name' => 'contains:description', 
			'options' => array(
				'label' => '', 
				'placeholder' => 'Developer',
				'value' => !empty($this->request->params['named']['contains']) ? substr($this->request->params['named']['contains'], strpos($this->request->params['named']['contains'], ':') + 1) : null,
				)
			),
		)
	));
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
    array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard')),
			)
		),
	array(
		'heading' => 'Developers',
		'items' => array(
			$this->Html->link('List', array('action' => 'index')),
			$this->Html->link('Edit', array('action' => 'edit', $propertyDeveloper['PropertyDeveloper']['id'])),
			$this->Html->link('Delete', array('action' => 'delete', $propertyDeveloper['PropertyDeveloper']['id']), null, __('Are you sure you want to delete %s?', $propertyDeveloper['PropertyDeveloper']['name']))
			)
		)
	)));
