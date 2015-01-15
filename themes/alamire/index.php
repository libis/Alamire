<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">
    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>
        
    <ul id="slider">
        <?php $items = get_records('Item', array('type'=>'Manuscript'));?>
        <?php $current=true;$class="";?>
        <?php foreach($items as $item):?>
            <li>
            <a href="<?php echo record_url($item);?>"><img src="<?php echo digitool_get_thumb_url($item);?>"></a>

            <div class="slide-title slide-text">                    
                <a href="<?php echo record_url($item);?>"><?php echo metadata($item,array('Item Type Metadata','Bibliographical orientation')); ?>
               </a>
            </div>              

            </li>
        <?php endforeach; ?>         
    </ul>
    <script>
        jQuery(document).ready(function(){
            jQuery('#slider').leanSlider({
                pauseTime: 6000
            });
        });
    </script>   

</div><!-- end primary -->

<div id="secondary">
    
    <h2>About</h2>
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
        <h2>News</h2>
        <?php echo libis_get_news(); ?>
        <p class="view-items-link">&raquo; <a href="<?php echo html_escape(url('items')); ?>">News archive</a></p>
    </div><!--end recent-items -->
    <?php endif; ?>
</div>
<?php echo foot(); ?>
