<?php
/**
 * Property Add View
 *
 * PHP versions 5
 *
 * Zuha(tm) : Business Management Applications (http://zuha.com)
 * Copyright 2009-2012, Zuha Foundation Inc. (http://zuhafoundation.org)
 *
 * Licensed under GPL v3 License
 * Must retain the above copyright notice and release modifications publicly.
 *
 * @copyright     Copyright 2009-2012, Zuha Foundation Inc. (http://zuha.com)
 * @link          http://zuha.com Zuha� Project
 * @package       zuha
 * @subpackage    zuha.app.plugins.properties.views
 * @since         Zuha(tm) v 0.0.1
 * @license       GPL v3 License (http://www.gnu.org/licenses/gpl.html) and Future Versions
 */
 ?>
<div class="propertyAdd form row clearfix">
	<div class="span8 col-md-8">
		<?php echo $this->Form->create('Property', array('type' => 'file')); ?>
	    <fieldset>
	    	<?php echo $this->Form->input('Property.name', array('label' => 'Property Name')); ?>
	        <?php echo $this->Form->input('Property.price', array('label' => 'Price <small><em>(ex. 100000.00)</em></small>', 'type' => 'number', 'step' => '0.01', 'min' => '0', 'max' => '99999999999')); ?>
			<?php echo $this->Form->input('Property.description', array('type' => 'richtext', 'label' => 'Property Description')); ?>
			<?php echo $this->Form->input('Property.location'); ?>
			<?php echo $this->Form->input('Property.bedrooms'); ?>
			<?php echo $this->Form->input('Property.bathrooms'); ?>
			<?php echo $this->Form->input('Property.footage', array('label' => 'Square Footage')); ?>
			<?php echo $this->Form->input('Property.acres');?>
	    </fieldset>
	</div>
	<div class="span4 col-md-4">
		<?php if(CakePlugin::loaded('Media')) : ?>
		<fieldset>
			<legend>Property Media</legend>
			<?php echo $this->Element('Media.selector', array('media' => $this->request->data['Media'], 'multiple' => true)); ?>
		</fieldset>
		<?php endif; ?>

	    <fieldset>
	        <legend class="toggleClick"><?php echo __('Optional property details'); ?></legend>
	        <?php echo $this->Form->input('Property.mls', array('label' => 'MLS Number')); ?>
			<?php echo $this->Form->input('Property.summary', array('type' => 'text', 'label' => 'Promo Text <br /><small><em>Short blurb of text to entice people to view more about this property.</em></small>')); ?>
			<?php echo $this->Form->input('Property.is_public', array('default' => 1, 'label' => 'Published')); ?>
			<?php echo $this->Form->input('Property.is_featured', array('default' => 0, 'label' => 'Featured')); ?>
	    </fieldset>
	
		<fieldset>
	 		<legend class="toggleClick"><?php echo __('Property categories');?></legend>
			<?php echo $this->Form->input('Category', array('multiple' => 'checkbox', 'label' => __('Choose categories (%s)', $this->Html->link('manage categories', array('admin' => 1, 'plugin' => 'properties', 'controller' => 'properties', 'action' => 'categories'))))); ?>
		</fieldset>

	</div>
</div>
<div class="row-fluid">
    <?php echo $this->Form->end('Save Property'); ?>
</div>

<?php
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard')),
			$this->Html->link(__('List'), array('controller' => 'properties', 'action' => 'index')),
			)
		),
	))); ?>