<?php
class Unbeatable_Chat_Helper_Data extends Mage_Core_Helper_Abstract {
    public function insertChatWidget(){
        try {
            $checkoutSession = Mage::getSingleton('checkout/session');
            $products = array();

            foreach ($checkoutSession->getQuote()->getAllItems() as $item) {
              $_item = Mage::getModel('catalog/product')->load($item->getProductId());
              $products[] = array(
                'image' => $_item->getThumbnailUrl(),
                'name'  => $_item->getName(),
                'quantity'   => $item->getQty(),
                'price' => number_format($item->getBaseCalculationPrice(), 2, '.', '')
              );
            }

            $apikey  = Mage::getStoreConfig('unbeatable/unbeatable_group2/unbeatable_apikey', Mage::app()->getStore());
            $enabled = Mage::getStoreConfig('unbeatable/unbeatable_group2/unbeatable_chat_enabled', Mage::app()->getStore());

            if ($enabled){
                echo '<script src="https://dash.unbeatable.com/public/widget.js?client='.$apikey.'" async></script>';
                echo '<script>var unb_tmr = setInterval(function(){ if(Unbeatable){ Unbeatable.setItems('.json_encode($products).'); clearInterval(unb_tmr); }},200)</script>';
            } else { 
                echo '<!-- UnbDisabled -->'; 
            }
        }
        catch(Exception $e){ 
            echo '<!-- UnbError -->'; 
        }
    }    
}
