<?php

class Unbeatable_Chat_CartController extends Mage_Core_Controller_Front_Action
{
	/**
	 * Index Page
	 */
	public function indexAction()
	{
        $cartItems = Mage::helper('unbeatablechat')->getCartItems();
        echo json_encode($cartItems);
	}
}

