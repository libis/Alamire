<?php

/**
* @package omeka
* @subpackage digitool plugin
* @copyright 2014 Libis.be
*/

require_once 'Omeka/Controller/Action.php';

class Rosetta_IndexController extends Omeka_Controller_AbstractActionController
{
	public function init() 
        {
            $this->_modelClass = 'RosettaObject';
            try {
                $this->_table = $this->getTable('RosettaObject');
                $this->aclResource = $this->findById();
            } catch (Omeka_Controller_Exception_404 $e){}
        }
    
        public function indexAction()
	{
            $digi = $this->findById();
            $this->view->digi = $digi;
            //todo -> transcriptie metadata
	}
	public function cgiAction()
	{
		
	}
	
	public function childcgiAction()
	{
	
	}
        
        protected function  _getDeleteSuccessMessage($record)
        {
            return __('The rosetta object was successfully deleted!');
        }

        protected function _getDeleteConfirmMessage($record)
        {
            return __('This will delete the link to a rosetta object.');
        }
}

?>