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
            'price' => number_format($item->getBaseCalculationPrice(), 2, '.', '')
          );
        }
        return $products;
    }

    /*
     * Used to insert chat widget via Template
     */
    public function insertChatWidget(){
        $apikey  = Mage::getStoreConfig('unbeatable/unbeatable_group2/unbeatable_apikey', Mage::app()->getStore());

        echo '<script src="https://dash.unbeatable.com/public/widget.js?client='.$apikey.'" async></script>';
        echo "<script>
         function ajax(url, callback, data, x) {
            try {
                x = new(this.XMLHttpRequest || ActiveXObject)('MSXML2.XMLHTTP.3.0');
                x.open(data ? 'POST' : 'GET', url, 1);
                x.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                x.onreadystatechange = function () {
                    x.readyState > 3 && callback && callback(x.responseText, x);
                };
                x.send(data)
            } catch (e) {
                window.console && console.log(e);
            }
        };                   
        ajax('" . Mage::getBaseUrl() . "unbeatable/cart/index', function(response){
            if(Unbeatable){
                Unbeatable.setItems(JSON.parse(response)); 
            }
        });
        </script>";
    }    
}
