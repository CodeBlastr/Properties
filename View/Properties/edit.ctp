<div class="row-fluid">
	<div class="pull-left span4 bs-docs-sidebar" id="propertyNav">
	    <ul class="nav-list bs-docs-sidenav">
	        <li><a class="tab-trigger" data-target="#propertyDetails"><i class="icon-chevron-right"></i> Property Information</a></li>
	        <li><a class="tab-trigger" data-target="#optionalDetails"><i class="icon-chevron-right"></i> Optional Details</a></li>
	        <li><a class="tab-trigger" data-target="#propertyImages"><i class="icon-chevron-right"></i> Property Images</a></li>
	        <li><a class="tab-trigger" data-target="#propertyCategorization"><i class="icon-chevron-right"></i> Categorization</a></li>
	    </ul>
	</div>
	
	<div class="property add form pull-right span8" data-spy="scroll" data-target="#propertyNav">
		<?php echo $this->Form->create('Property', array('type' => 'file')); ?>
	    <fieldset id="property details">
	        <legend class="sectionTitle"><?php echo __d('properties', 'Property Information'); ?></legend>
	    	<?php
			echo $this->Form->input('Property.id');
			echo $this->Form->input('Property.name', array('label' => 'Display Name'));
	        echo $this->Form->input('Property.price', array('label' => 'Retail Price <small><em>(ex. 0000.00)</em></small>', 'step' => '0.01', 'min' => '0', 'max' => '99999999999'));
			echo $this->Form->input('Property.description', array('type' => 'richtext', 'label' => 'What is the sales copy for this item?')); 
			echo $this->Form->input('Property.location');
			echo $this->Form->input('Property.bedrooms');
			echo $this->Form->input('Property.bathrooms');
			echo $this->Form->input('Property.footage');
			echo $this->Form->input('Property.acres');?>
	    </fieldset>
	    <fieldset id="optionalDetails">
	        <legend class="toggleClick"><?php echo __d('properties', 'Optional property details'); ?></legend>
	        <?php
	    	echo $this->Form->input('Property.mls', array('label' => 'MLS Number'));
	        echo $this->Form->input('Property.summary', array('type' => 'text', 'label' => 'Promo Text <br /><small><em>Short blurb of text to entice people to view more about this property.</em></small>'));
			echo $this->Form->input('Property.is_public', array('default' => 1, 'label' => 'Published'));
	        echo $this->Form->input('Property.search_tags'); ?>
	    </fieldset>
	    <fieldset id="propertyImages">
	        <legend class="toggleClick"><?php echo __d('properties', 'Property images'); ?></legend>
	        <?php echo $this->Html->link('Edit Images', array('admin' => 1, 'plugin' => 'galleries', 'controller' => 'galleries', 'action' => 'edit', 'Property', $this->request->data['Property']['id'])); ?>
	        <?php echo $this->Element('gallery', array('model' => 'Property', 'foreignKey' => $this->request->data['Property']['id']), array('plugin' => 'galleries')); ?>
	        </fieldset>
	    
	    <?php if (empty($this->request->data['Property']['parent_id']) && in_array('Categories', CakePlugin::loaded())) : ?>
		<fieldset id="propertyCategorization">
	 		<legend class="toggleClick"><?php echo __d('properties', 'Property categories');?></legend>
			<?php echo $this->Form->input('Category', array('multiple' => 'checkbox', 'selected' => $selectedCategories, 'label' => __('Choose categories (%s)', $this->Html->link('manage categories', array('admin' => 1, 'plugin' => 'properties', 'controller' => 'properties', 'action' => 'categories'))))); ?>
		</fieldset>
	    <?php endif;?>
	    <?php echo $this->Form->submit('Save & Continue', array('name' => 'SaveAndContinue', 'class' => 'btn pull-right')); ?>
	    <?php echo $this->Form->end('Save'); ?>
	</div>
</div>

<script type="text/javascript">
$(function() {
    $(document).ready( function(){
        // animation 
        var offset = $('#propertyNav').offset().top;
        $('#propertyNav a.tab-trigger').click(function(e) {
            e.preventDefault();
            var wait = $('legend.toggleClick').siblings().length;
            var i = 1;
            var me = $(this);
            $('legend.toggleClick').siblings().hide('fast', function() {
                if(i == wait) {
                    var navTo = $(me.attr('data-target')).offset().top;
                    $('#propertyNav a').parent().removeClass('active');
                    me.parent().addClass('active');
                    $('html, body').animate({ scrollTop: navTo - offset }, 800, function() {
                        $('legend.toggleClick', me.attr('data-target')).siblings().show('slow');
                    });
                }
                ++i;
            });
        });
        // side nav clean up
        $('#propertyNav a[data-target="#propertyDetails"]').parent().addClass('active');
        $('body').css('padding-bottom', '800px');

    });
})

</script>



<?php
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
    array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard')),
			)
		),
    array(
    	'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('List'), array('controller' => 'properties', 'action' => 'index')),
            $this->Html->link(__('View'), array('controller' => 'properties', 'action' => 'view', $this->request->data['Property']['id'])),
			$this->Html->link(__('Delete'), array('controller' => 'properties', 'action' => 'delete', $this->request->data['Property']['id']), array(), 'Are you sure? (cannot be undone)'),
    		)
		),
	))); ?>