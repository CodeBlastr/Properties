<div class="properties">  
    <div class="indexContainer">
    <?php
    if (!empty($properties)) {
        $i = 0;
        foreach ($properties as $property) { ?>
            <div class="index row-fluid">
                <div class="index cell gallery thumb image" id="galleryThumb<?php echo $property['Property']['id']; ?>"> 
                    <?php echo $this->Element('Galleries.thumb', array('model' => 'Property', 'foreignKey' => $property['Property']['id'], 'thumbSize' => 'medium', 'thumbLink' => '/properties/properties/view/'.$property['Property']['id'])); ?>
                </div>
                <div class="index cell item description meta" id="propertyDescription<?php echo $property['Property']['id']; ?>"> 
                    <ul class="meta data">
                        <li><?php echo strip_tags($property['Property']['summary']); ?></li>
                    </ul>
                </div>
                <div class="index cell data">
                    <div class="index cell item property name title" id="propertyName<?php echo $property['Property']['id']; ?>">
                        <div class="record data">
                            <h3><?php echo $this->Html->link($property['Property']['name'] , array('controller' => 'properties' , 'action' => 'view' , $property['Property']['id'])); ?></h3>
                        </div>
                    </div>
                    
                    <div class="index cell item price" id="propertyPrice<?php echo $property['Property']['id']; ?>"> 
                        <?php echo __('$%s', $property['Property']['price']); ?>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        echo __('<p>No properties found. %s</p>', $this->Html->link('Add the first', array('plugin' => 'properties', 'controller' => 'properties', 'action' => 'add')));
    } ?>
    </div>
    <?php echo $this->Element('paging');?>
</div>