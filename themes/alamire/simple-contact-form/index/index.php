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
            <?php echo $this->formCheckbox('account','0',array('checked'=>false));  ?>           
        </div>    
        <div class="field">
            <?php echo $this->formLabel('newsletter', 'I would like to be added to the Alamire Foundation contact list'); ?>
            <?php echo $this->formCheckbox('newsletter','0',array('checked'=>true));  ?>           
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
<?php echo foot();
