<?php
class Unbeatable_Chat_Helper_Data extends Mage_Core_Helper_Abstract {

    /*
     * Used by CartController
     */
    public function getCartItems(){
        $checkoutSession = Mage::getSingleton('checkout/session');
        $products = array();

        foreach ($checkoutSession->getQuote()->getAllItems() as $item) {
          $_item = Mage::getModel('catalog/product')->load($item->getProductId());
          $products[] = array(
            'image' => $_item->getThumbnailUrl(),
            'name'  => $_item->getName(),
            'quantity'   => $item->getQty(),
            'currency' => Mage::app()->getStore()->getCurrentCurrencyCode(),
            'price' => number_format($item->getBaseCalculationPrice(), 2, '.', '')
          );
        }
        return $products;
    }
}
