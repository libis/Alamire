<?php echo head(); ?>
<div id="primary">

    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>

</div><!-- end primary -->
<div id="secondary">
<h4><?php echo html_escape(get_option('simple_contact_form_thankyou_page_title')); // Not HTML ?></h4>
<?php echo get_option('simple_contact_form_thankyou_page_message'); // HTML ?>
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
            <script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'&'+'#'+'1'+'0'+'9'+';'+'a'+'i'+'&'+'#'+'1'+'0'+'8'+';'+'t'+'o'+
'&'+'#'+'5'+'8'+';'+'i'+'&'+'#'+'1'+'1'+'0'+';'+'f'+'o'+'&'+'#'+'6'+'4'+';'+'a'+'l'+'&'+'#'+'9'+'7'+
';'+'%'+'6'+'D'+'%'+'6'+'9'+'r'+'%'+'6'+'5'+'%'+'6'+'&'+'#'+'5'+'4'+';'+'%'+'6'+'F'+'u'+'n'+'d'+'a'+
'%'+'7'+'4'+'i'+'o'+'n'+'&'+'#'+'4'+'6'+';'+'b'+'e'+"'"+'>'+'i'+'&'+'#'+'1'+'1'+'0'+';'+'f'+'o'+'&'+
'#'+'6'+'4'+';'+'a'+'l'+'a'+'m'+'&'+'#'+'1'+'0'+'5'+';'+'r'+'e'+'&'+'#'+'1'+'0'+'2'+';'+'o'+'u'+'n'+
'&'+'#'+'1'+'0'+'0'+';'+'a'+'&'+'#'+'1'+'1'+'6'+';'+'i'+'o'+'n'+'&'+'#'+'4'+'6'+';'+'b'+'e'+'<'+'/'+
'a'+'>');</script><noscript>[Turn on JavaScript to see the email address]</noscript><br>
            <a href="http://www.alamirefoundation.org">www.alamirefoundation.org</a>
            <p>
            HOUSE OF POLYPHONY<br>
            ABDIJ VAN PARK 1<br>
            BE-3001 LEUVEN<br>
            TEL +32 16 38 92 85
            </p>
        </div>

        <?php echo libis_get_simple_page_content('Partners');?>


        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <!--<nav><?php echo public_nav_main()->setMaxDepth(0); ?></nav>-->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>

<?php echo foot();
