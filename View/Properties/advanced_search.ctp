<div id="propertyAdvancedSearch">
<?php echo $this->Form->create(null, array('url' => array('action' => 'index'), 'type' => 'get')); ?>
<div class="form-group">
    <?php echo $this->Form->input('Property.name', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.description', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.price-min', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
    <?php echo $this->Form->input('Property.price-max', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.location', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.bedrooms', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.bathrooms', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.footage', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<div class="form-group">
    <?php echo $this->Form->input('Property.acres', array('type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
</div>

<?php echo $this->Form->submit('Search', array('name' => 'advanced')); ?>

<?php echo $this->Form->end(); ?>



</div>