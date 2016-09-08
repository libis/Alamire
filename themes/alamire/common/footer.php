<footer>
    
    <?php if(is_current_url('/')):?>
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
    <?php else: ?>
        <div id="contact-info">
            <p>Alamire Foundation<br>
            Research Group Musicology KU Leuven
            </p>
            
           
            <p>
                The use of this website and of the IDEM database implies agreement with the <a href="<?php echo url('terms');?>">terms and conditions</a>.
            </p>
            Website developed by <a href="//libis.be">LIBIS</a>
        </div>  
    <?php endif; ?>           
        
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <!--<nav><?php echo public_nav_main()->setMaxDepth(0); ?></nav>-->
        


     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
               Omeka.dropDown();
    });
</script>

</body>

</html>
