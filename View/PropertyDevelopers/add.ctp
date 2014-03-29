<?php
/**
 * Property Developers Add View
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
<div class="property-developers form clearfix">
	<?php echo $this->Form->create('PropertyDeveloper', array('type' => 'file')); ?>
	<fieldset>
    	<?php echo $this->Form->input('PropertyDeveloper.name'); ?>
		<?php echo $this->Form->input('PropertyDeveloper.description'); ?>
	</fieldset>
    <?php echo $this->Form->end('Save Property'); ?>
</div>

<?php
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Property Developers',
		'items' => array(
			$this->Html->link(__('List'), array('controller' => 'property_developers', 'action' => 'index')),
			)
		),
	)));