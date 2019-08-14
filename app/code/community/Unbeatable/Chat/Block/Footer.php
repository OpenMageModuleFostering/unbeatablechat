<?php

class Unbeatable_Chat_Block_Footer extends Mage_Core_Block_Template
{

    const XML_PATH_CHAT_ENABLED = 'unbeatable/unbeatable_group2/unbeatable_chat_enabled';

    public function isEnabled() {
        return Mage::getStoreConfig(self::XML_PATH_CHAT_ENABLED, Mage::app()->getStore());
    }

}