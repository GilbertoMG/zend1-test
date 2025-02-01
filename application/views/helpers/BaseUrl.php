<?php
class Zend_View_Helper_BaseUrl extends Zend_View_Helper_Abstract
{
    public function baseUrl($path = '')
    {
        $baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
        return $baseUrl . $path;
    }
}