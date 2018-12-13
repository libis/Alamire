<?php echo head(); ?>
<div id="primary">

    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>

</div><!-- end primary -->
<div id="secondary">
    <h4><?php echo html_escape(get_option('simple_contact_form_contact_page_title')); ?></h4>
<div id="simple-contact">
    <div id="form-instructions">
        <?php echo get_option('simple_contact_form_contact_page_instructions'); // HTML ?>
    </div>
    <?php echo flash(); ?>
    <form name="contact_form" id="contact-form"  method="post" enctype="multipart/form-data" accept-charset="utf-8">

        <fieldset>
        <div class="field">
            <div class='inputs'>
            <?php echo $this->formText('name', $name, array('class'=>'textinput','placeholder'=>'name')); ?>
            </div>
        </div>

        <div class="field">
            <div class='inputs'>
                <?php echo $this->formText('email', $email, array('class'=>'textinput','placeholder'=>'email'));  ?>
            </div>
        </div>

        <div class="field">
            <div class='inputs'>
                <?php echo $this->formText('institution', $institution, array('class'=>'textinput','placeholder'=>'institution'));  ?>
            </div>
        </div>

        <div class="field">
          <div class='inputs'>
          <?php echo $this->formTextarea('message', $message, array('class'=>'textinput', 'rows' => '10','placeholder'=>'message')); ?>
          </div>
        </div>

        <div class="field">
            <?php echo $this->formLabel('account', 'I request an account for the IDEM database'); ?>
            <input type="checkbox" name="account">
        </div>
        <div class="field">
            <?php echo $this->formLabel('newsletter', 'I would like to be added to the Alamire Foundation contact list'); ?>
            <input type="checkbox" name="newsletter" checked="true">
        </div>

        </fieldset>


        <fieldset>
        <?php if ($captcha): ?>
        <div class="field">
            <?php echo $captcha; ?>
        </div>
        <?php endif; ?>

        <div class="field">
          <?php echo $this->formSubmit('send', 'Send Message'); ?>
        </div>

        </fieldset>
    </form>

</div>

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
