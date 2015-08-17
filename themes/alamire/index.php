<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">
    <p>Continue to IDEM<br>
       <a href="<?php echo url('solr-search');?>">I agree to the terms
           and conditions of use</a></p>    
           <p><a href="<?php echo url('terms');?>">About the terms
           and conditions</a></p>      
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
        <h5 class="spotlight-header">In the spotlight</h5>
        <?php echo libis_get_featured(); ?>
    </div><!--end recent-items -->
    <?php endif; ?>
</div>

</div><!-- end content -->

<footer>

        <div id="contact-info">
            <p>Alamire Foundation<br>
            Research Group Musicology KU Leuven
            </p>
            CENTRALE BIBLIOTHEEK<br>
            MGR. LADEUZEPLEIN 21<br>
            PB 5591 - BE-3000 LEUVEN<br>
            TEL +32 16 32 87 50<br>
            info@alamirefoundation.be<br>
            <a href="http://www.alamirefoundation.org">www.alamirefoundation.org</a>
            <p>
            HOUSE OF POLYPHONY<br>
            ABDIJ VAN PARK 1<br>
            BE-3001 LEUVEN<br>
            TEL +32 16 38 92 85
            </p>
        </div>   
               
        
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <!--<nav><?php echo public_nav_main()->setMaxDepth(0); ?></nav>-->
        


     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>
</div>
<?php echo foot(); ?>
