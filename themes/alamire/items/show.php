<?php echo head(array('title' => metadata('item', array('Item Type Metadata','Manuscript label')),'bodyclass' => 'items show')); ?>
<div id="primary">
   
    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>
    
    <?php 
        $item = get_current_record('Item');
        echo libis_get_image($item);?>

</div><!-- end primary -->
<div id="secondary">
    
    
    <!-- Items metadata -->
    <div id="item-metadata">   
        <table class="show-table">
            <tr><td>    
                <h3>Manuscript label</h3>
            </td><td>    
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Manuscript label'),array('delimiter'=>'<br>')); ?>
        </div>
            </td></tr>
             <tr><td>    
                <h3>Holding institution</h3>
            </td><td>    
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Holding institution'),array('delimiter'=>'<br>')); ?>
        </div>
            </td></tr>
        <tr><td>
        <h3>Shelfmark</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Shelfmark'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Format (general)</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Format (general)'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Format (specific)</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Format (specific)'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Category</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Category'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Content</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Content'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Authors / composers</h3>
         </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Authors / composers'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Language</h3>
         </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Language'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Origin (country / region)</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Origin (country / region)'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Origin (city / location)</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Origin (city / location)'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Date range</h3>
         </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Date range'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Support</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Support'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Folios</h3>
         </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Folios'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Size</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Size'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Miniatures</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Miniatures'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
        
        <tr><td>
        <h3>Bibliographical orientation</h3>
        </td><td> 
        <div class="element-text">
            <?php echo metadata('item', array('Item Type Metadata','Bibliographical orientation'),array('delimiter'=>'<br>')); ?>
        </div>
        </td></tr>
       
        <?php if(metadata('item','Collection Name')): ?>
            <tr><td>
            <h3><?php echo __('Collection'); ?></h3>
            </td><td> 
                
             <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
           </div>        
            </td></tr>   
               <?php endif; ?>

               
          <!-- The following prints a list of all tags associated with the item -->
         <?php if (metadata('item','has tags')): ?>
          <tr><td> 
         <div id="item-tags" class="element">
             <h3><?php echo __('Tags'); ?></h3>
             </td><td> 
             <div class="element-text"><?php echo tag_string('item'); ?></div>
         </div>
                  </td></tr>
         <?php endif;?>
        </table> 

         <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
         
         <ul class="item-pagination navigation">
         <li id="previous-item" class="previous"><?php echo link_to_previous_item_show('previous result'); ?></li>
         <li id="next-item" class="next"><?php echo link_to_next_item_show('next result'); ?></li>
         <li><a href="<?php echo metadata('item', array('Item Type Metadata','Viewer link')); ?>">images</a></li>
         <li><a href="<?php echo url('collectiveaccess') ?>">collective access</a></li>
         </ul>
    </div>

    

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
