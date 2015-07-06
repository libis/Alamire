<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">
    <p><a id="continue" href="<?php echo url('solr-search');?>">Continue to IDEM</a><br>
       <a href="<?php echo url('terms');?>">I agree to the terms
           and conditions of use</a></p>    
</div><!-- end primary -->

<div id="secondary">
    
    <h5 class="about-header">About</h5>
    
    <?php echo libis_get_simple_page_content('About');?>
        
    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->

<div id="third">
    <?php
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 3;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <div id="recent-items">
        <h5 class="spotlight-header">Spotlight</h5>
        <?php echo libis_get_featured(); ?>
    </div><!--end recent-items -->
    <?php endif; ?>
</div>
<?php echo foot(); ?>
