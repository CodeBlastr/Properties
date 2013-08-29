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
<div class="propertyAdd form row-fluid clearfix">
	<div class="span8 pull-left">
		<?php echo $this->Form->create('Property', array('type' => 'file')); ?>
	    <fieldset>
	    	<?php
			echo $this->Form->input('Property.name', array('label' => 'Property Name'));
	        echo $this->Form->input('Property.price', array('label' => 'Price <small><em>(ex. 100000.00)</em></small>', 'type' => 'number', 'step' => '0.01', 'min' => '0', 'max' => '99999999999')); 
	        echo $this->Form->input('GalleryImage.filename', array('type' => 'file', 'label' => 'Property Image  <br /><small><em>You can add additional images after you save.</em></small>'));
			echo $this->Form->input('Property.description', array('type' => 'richtext', 'label' => 'Property Description')); 
			echo $this->Form->input('Property.location');
			echo $this->Form->input('Property.bedrooms');
			echo $this->Form->input('Product.bathrooms');
			echo $this->Form->input('Product.footage', array('label' => 'Square Footage'));
			echo $this->Form->input('Product.acres');?>
	    </fieldset>
	</div>
	<div class="span4 pull-right">
	    <fieldset>
	        <legend class="toggleClick"><?php echo __('Optional property details'); ?></legend>
	        <?php
	        echo $this->Form->input('Product.mls', array('label' => 'MLS Number'));
	        echo $this->Form->input('Product.summary', array('type' => 'text', 'label' => 'Promo Text <br /><small><em>Short blurb of text to entice people to view more about this property.</em></small>'));
			echo $this->Form->input('Product.is_public', array('default' => 1, 'label' => 'Published')); ?>
	    </fieldset>
	
		<fieldset>
	 		<legend class="toggleClick"><?php echo __('Property categories');?></legend>
				<?php echo $this->Form->input('Category', array('multiple' => 'checkbox', 'label' => __('Choose categories (%s)', $this->Html->link('manage categories', array('admin' => 1, 'plugin' => 'products', 'controller' => 'products', 'action' => 'categories'))))); ?>
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