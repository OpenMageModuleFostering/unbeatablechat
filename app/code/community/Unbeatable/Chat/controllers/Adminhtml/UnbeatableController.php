<?php

class Unbeatable_Chat_Adminhtml_UnbeatableController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction(){

		$this->loadLayout();

		return $this->renderLayout();

	}

}