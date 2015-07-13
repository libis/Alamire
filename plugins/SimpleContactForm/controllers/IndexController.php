<?php
/**
 * @copyright Roy Rosenzweig Center for History and New Media, 2007-2012
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package SimpleContactForm
 */

/**
 * Controller for Contact form.
 *
 * @package SimpleContactForm
 */
class SimpleContactForm_IndexController extends Omeka_Controller_AbstractActionController
{
    public function indexAction()
    {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';;
        $institution = isset($_POST['institution']) ? $_POST['institution'] : '';;
        $message = isset($_POST['message']) ? $_POST['message'] : '';;        
        $account = isset($_POST['account']) ? $_POST['account'] : '';;
        $newsletter = isset($_POST['newsletter']) ? $_POST['newsletter'] : '';;

        $captchaObj = $this->_setupCaptcha();

        if ($this->getRequest()->isPost()) {
            // If the form submission is valid, then send out the email
            if ($this->_validateFormSubmission($captchaObj)) {
            $this->sendEmailNotification($_POST['email'], $_POST['name'],$_POST['institution'], $_POST['message'],$_POST['account'],$_POST['newsletter']);
                $url = WEB_ROOT."/".SIMPLE_CONTACT_FORM_PAGE_PATH."thankyou";
                    $this->_helper->redirector->goToUrl($url);
            }
        }

        // Render the HTML for the captcha itself.
        // Pass this a blank Zend_View b/c ZF forces it.
        if ($captchaObj) {
            $captcha = $captchaObj->render(new Zend_View);
        } else {
            $captcha = '';
        }

        $this->view->assign(compact('name','email','institution','message','account','newsletter','captcha'));
    }

    public function thankyouAction()
    {
    }

    protected function _validateFormSubmission($captcha = null)
    {
        $valid = true;
        $msg = $this->getRequest()->getPost('message');
        $email = $this->getRequest()->getPost('email');
        // ZF ReCaptcha ignores the 1st arg.
        if ($captcha and !$captcha->isValid('foo', $_POST)) {
            $this->_helper->flashMessenger(__('Your CAPTCHA submission was invalid, please try again.'));
            $valid = false;
        } else if (!Zend_Validate::is($email, 'EmailAddress')) {
            $this->_helper->flashMessenger(__('Please enter a valid email address.'));
            $valid = false;
        } else if (empty($msg)) {
            $this->_helper->flashMessenger(__('Please enter a message.'));
            $valid = false;
        }

        return $valid;
    }

    protected function _setupCaptcha()
    {
        return Omeka_Captcha::getCaptcha();
    }

    protected function sendEmailNotification($formEmail, $formName,$formInstitution, $formMessage,$formAccount,$formNewsletter) 
    {
        //notify the admin
        //use the admin email specified in the plugin configuration.
        
        if($formAccount == 'on'){
            $formAccount='Yes';            
        }else{
            $formAccount = 'no';
        }
        if($formNewsletter == 'on'){
            $formNewsletter='Yes';            
        }else{
            $formNewsletter = 'no';
        }
        
        $forwardToEmail = get_option('simple_contact_form_forward_to_email');
        if (!empty($forwardToEmail)) {
            $mail = new Zend_Mail('UTF-8');
            $mail->setBodyText(get_option('simple_contact_form_admin_notification_email_message_header')
                    . "\n\n" . $formName ." just sent the following message:"
                    . "\n\n" . $formMessage                    
                    . "\n\n" . "Whishes to receive an IDEM database account: ".$formAccount
                    . "\n\n" . "Whishes to receive the newsletter: ".$formNewsletter
                    . "\n\n" . "Institution of ".$formName.": ".$formInstitution
                    );
            $mail->setFrom($formEmail, $formName);
            $mail->addTo($forwardToEmail);
            $mail->setSubject(get_option('site_title') . ' - ' . get_option('simple_contact_form_admin_notification_email_subject'));
            $mail->send();
        }

        //notify the user who sent the message
        $replyToEmail = get_option('simple_contact_form_reply_from_email');
        if (!empty($replyToEmail)) {
            $mail = new Zend_Mail('UTF-8');
            $mail->setBodyText(get_option('simple_contact_form_user_notification_email_message_header') . "\n\n" . $formMessage);
            $mail->setFrom($replyToEmail);
            $mail->addTo($formEmail, $formName);
            $mail->setSubject(get_option('site_title') . ' - ' . get_option('simple_contact_form_user_notification_email_subject'));
            $mail->send();
        }
    }
}
