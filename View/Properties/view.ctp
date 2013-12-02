
<?php echo $this->Media->watermark('default', array('data' => $property, 'width' => '100%', 'alt' => $property['Property']['name'])); ?>
		
<div class="property view row">
	<div class="col-md-8">
		<?php echo $this->Media->carousel('default', array('data' => $property, 'width' => '100%', 'alt' => $property['Property']['name'])); ?>
	</div>
	<div class="col-md-4">
		<h2><?php echo $property['Property']['name']; ?></h2>
		<h4><?php echo ZuhaInflector::pricify($property['Property']['price'], array('currency' => 'USD')); ?></h4>
		<p><?php echo $property['Property']['location']; ?></p>
		<p>Listed on <?php echo ZuhaInflector::datify($property['Property']['created']); ?></p>
		<p>MLS <?php echo $property['Property']['mls']; ?></p>
		<p>Bedrooms <?php echo $property['Property']['bedrooms']; ?></p>
		<p>Bathrooms <?php echo $property['Property']['bathrooms']; ?></p>
		<p>Sq Footage <?php echo $property['Property']['7500']; ?></p>
		<p>Acres <?php echo $property['Property']['acres']; ?></p>
		<?php echo $property['Property']['description']; ?>
	</div>
</div>

<?php //echo $this->element('mapped', array('locations' => $properties, 'mapHeight' => '400px', 'mapZoom' => 11, 'autoZoomMultiple' => true), array('plugin' => 'maps')); ?>

<?php
// set contextual search options
$this->set('forms_search', array(
    'url' => '/properties/properties/index/', 
	'inputs' => array(
		array(
			'name' => 'contains:name', 
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
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard')),
			)
		),
	array(
		'heading' => 'Property',
		'items' => array(
			$this->Html->link(__d('properties', 'List'), array('action' => 'index')),
			$this->Html->link(__d('properties', 'Edit'), array('action' => 'edit', $property['Property']['id'])),
			$this->Html->link(__d('properties', 'Delete'), array('action' => 'delete', $property['Property']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $property['Property']['id'])),
			),
		),
	))); ?>
