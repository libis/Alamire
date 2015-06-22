<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">
    <p><a id="continue" href="<?php echo url('solr-search');?>">Continue to IDEM</a><br>
       <a href="<?php echo url('terms');?>">I agree to the terms
           and conditions of use</a></p>
    
</div><!-- end primary -->

<div id="secondary">
    
    <h5 class="about-header">About</h5>
    <p>Proin at justo eget velit dapibus tincidunt vel id nisl. Donec in dapibus dui, nec tempus tortor. Cras malesuada semper porta. Morbi pretium tellus vitae lectus ultricies ornare. Curabitur sodales ipsum erat, eget cursus diam ultrices vitae. Quisque ante nisi, maximus vel ultrices ut, luctus vel felis. Nulla non aliquet turpis. Sed et felis nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
    <p>Donec venenatis arcu at consectetur ornare. Nulla finibus massa at varius vulputate. Nam eget felis sit amet neque consectetur sodales. Aenean rutrum lacinia ornare. Vivamus euismod augue vel felis commodo, sed pulvinar velit aliquet. Integer augue nisl, feugiat in erat ac, tristique suscipit arcu. Aenean pulvinar enim vel euismod ultricies.</p>
    <p>Donec auctor suscipit erat sit amet placerat. Suspendisse et tristique velit. Duis dignissim commodo sem, in ultricies ex congue nec. Maecenas nibh arcu, auctor sed pulvinar dapibus, suscipit eu nibh. Nulla eget neque nec nunc laoreet ornare. Donec sed fringilla ex.</p>
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
