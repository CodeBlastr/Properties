<div class="properties categories row">
    <div class="span6 pull-left">
        <h3>Categories</h3>
        <?php 
        echo $this->Tree->generate($categories, array(
            'model' => 'Category', 
    		'alias' => 'item_text', 
			'class' => 'categoriesList', 
			'id' => 'categoriesList', 
			'element' => 'Categories/item', 
			'elementPlugin' => 'properties'));

        echo $this->Form->create('Category');
        echo __('<fieldset><legend>Create Category</legend>');
        echo $this->Form->input('Category.parent_id', array('empty' => '-- Optional --', 'options' => $parentCategories));
        echo $this->Form->input('Category.name');
        echo $this->Form->input('Category.model', array('type' => 'hidden', 'value' => 'Property'));
        echo __('</fieldset>');
        echo $this->Form->end('Submit'); ?>
    </div>
</div>
<?php
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
    array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard')),
			)
		),
	))); ?>