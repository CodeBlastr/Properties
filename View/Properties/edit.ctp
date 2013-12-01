<div class="row">
	<div class="pull-left span4 col-md-4 bs-docs-sidebar" id="propertyNav">
	    <ul class="list-group nav-list">
	        <li class="list-group-item"><a class="tab-trigger" data-target="#propertyDetails"><i class="icon-chevron-right"></i> Property Information</a></li>
	        <li class="list-group-item"><a class="tab-trigger" data-target="#optionalDetails"><i class="icon-chevron-right"></i> Optional Details</a></li>
	        <li class="list-group-item"><a class="tab-trigger" data-target="#propertyImages"><i class="icon-chevron-right"></i> Property Images</a></li>
	       	<?php echo CakePlugin::loaded('Categories') ? '<li class="list-group-item"><a class="tab-trigger" data-target="#propertyCategorization"><i class="icon-chevron-right"></i> Categorization</a></li>' : null; ?>
	    </ul>
	</div>
	
	<div class="property add form pull-right span8 col-md-8" data-spy="scroll" data-target="#propertyNav">
		<?php echo $this->Form->create('Property', array('type' => 'file')); ?>
	    <fieldset id="property details">
	        <legend class="sectionTitle"><?php echo __d('properties', 'Property Information'); ?></legend>
	    	<?php echo $this->Form->input('Property.id'); ?>
			<?php echo $this->Form->input('Property.name', array('label' => 'Display Name')); ?>
			<?php echo $this->Form->input('Property.price', array('label' => 'Retail Price <small><em>(ex. 0000.00)</em></small>', 'step' => '0.01', 'min' => '0', 'max' => '99999999999')); ?>
			<?php echo $this->Form->input('Property.description', array('type' => 'richtext', 'label' => 'What is the sales copy for this item?')); ?>
			<?php echo $this->Form->input('Property.location'); ?>
			<?php echo $this->Form->input('Property.bedrooms'); ?>
			<?php echo $this->Form->input('Property.bathrooms'); ?>
			<?php echo $this->Form->input('Property.footage'); ?>
			<?php echo $this->Form->input('Property.acres');?>
	    </fieldset>
	    <fieldset id="optionalDetails">
	        <legend class="toggleClick"><?php echo __d('properties', 'Optional property details'); ?></legend>
	        <?php echo $this->Form->input('Property.mls', array('label' => 'MLS Number')); ?>
	        <?php echo $this->Form->input('Property.summary', array('type' => 'text', 'label' => 'Promo Text <br /><small><em>Short blurb of text to entice people to view more about this property.</em></small>')); ?>
	        <?php echo $this->Form->input('Property.is_public', array('default' => 1, 'label' => 'Published')); ?>
	        <?php echo $this->Form->input('Property.is_featured', array('default' => 0, 'label' => 'Featured')); ?>
	        <?php echo $this->Form->input('Property.search_tags'); ?>
	    </fieldset>
	    <fieldset id="propertyImages">
	        <legend class="toggleClick"><?php echo __d('properties', 'Property Media'); ?></legend>
			<?php if(CakePlugin::loaded('Media')) : ?>
				<?php echo $this->Element('Media.selector', array('media' => $this->request->data['Media'], 'multiple' => true)); ?>
			<?php endif; ?>
		</fieldset>
	    <?php if (empty($this->request->data['Property']['parent_id']) && CakePlugin::loaded('Categories')) : ?>
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
	)));