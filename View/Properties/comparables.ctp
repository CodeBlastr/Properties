<?php echo $this->Html->script('https://maps.googleapis.com/maps/api/js?sensor=false', array('inline' => false)); ?>
<?php echo $this->Html->script('plugins/multi-maps', array('inline' => false)); ?>

<div class="properties index row">
	<div class="col-md-7">
		<h4><strong><?php echo $property['Property']['name']; ?></strong></h4>
		<hr>
		<p><?php echo $property['Property']['location']; ?> <span class="badge"><?php echo ZuhaInflector::pricify($property['Property']['price'], array('currency' => 'USD')); ?></span></p>
		<div class="map_canvas" style="width: 100%; height: 300px;">
			<?php foreach ($maps as $map) : ?>
			<div class="map-item">
				<div class="latitude"><?php echo $map['Map']['latitude']; ?></div>
				<div class="longitude"><?php echo $map['Map']['longitude']; ?></div>
				<div class="marker_text"><?php echo $map['Map']['marker_text']; ?></div>
			</div>
			<?php endforeach; ?>
			<div class="zoom">8</div>
		</div>
		<?php //echo $this->element('Maps.maps', array('locations' => $maps, 'mapHeight' => '300px', 'mapZoom' => 10)); ?>
		<h5 class="light-grey-text"><?php echo $property['Map']['_address_components']['neighborhood']['short_name']; ?>, <?php echo $property['Map']['_address_components']['sublocality']['short_name']; ?>, <?php echo $property['Map']['_address_components']['administrative_area_level_1']['short_name']; ?></h5>
	</div>
	<div class="col-md-5">
		<h4><strong>Add Comparable Property</strong></h4>
		<hr>
		<?php echo $this->Form->create('Property', array('url' => array('action' => 'add'))); ?>
		<?php echo $this->Form->input('Property.is_comparable', array('type' => 'hidden', 'value' => 1)); ?>
		<?php echo $this->Form->input('Property.comparables', array('type' => 'hidden', 'value' => $property['Property']['id'])); ?>
		<?php echo $this->Form->input('Override.redirect', array('type' => 'hidden', 'value' => $this->request->here)); ?>
		<?php echo $this->Form->input('Property.name', array('value' => '')); ?>
		<?php echo $this->Form->input('Property.location', array('value' => '', 'placeholder' => '123 Main St. Anyville, ST 55512')); ?>
		<?php echo $this->Form->input('Property.price', array('value' => '', 'type' => 'number')); ?>
		<?php echo $this->Form->end('Save'); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h4><strong>Comparable Area Properties</strong></h4>
		<hr>
		<?php if (!empty($comparables)) : ?>
			<div class="index-list-group">
			<?php foreach ($comparables as $property) : ?>
				<div class="list-group-item clearfix">
					<div class="col-md-2">
						<?php echo $this->Media->display($property['Media'][0], array('class' => 'pull-left')); ?>
					</div>
					<div class="col-md-7">
						<?php echo $this->Html->link($property['Property']['name'], array('action' => 'view', $property['Property']['id'])); ?>
						<span class="badge"><?php echo ZuhaInflector::pricify($property['Property']['price'], array('currency' => 'USD')); ?></span>
					</div>
					<div class="col-md-3">
						<span class="badge"><?php echo $this->Html->link('Edit', array('action' => 'edit', $property['Property']['id'])); ?></span>
						<span class="badge"><?php echo $this->Html->link('Delete', array('action' => 'delete', $property['Property']['id']), null, __('Are you sure?')); ?></span>
					</div>
				</div>
			<?php endforeach; ?>
			</div>  	
		<?php else : ?>
	        <p>No comparables found.</p>
		<?php endif; ?>
	</div>
</div>

<?php
// set contextual search options
$this->set('formsSearch', array(
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
        )));