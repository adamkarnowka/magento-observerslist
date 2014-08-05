<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 04.08.14
 * Time: 19:00
 */ 
class Creativestyle_ObserverList_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * Fetches textvalue from node's child.
     *
     * @param string     $key
     * @param DOMElement $node
     *
     * @return string Node's text value
     */
    public function getChildNodeValue($key, DOMElement $node){
        $childNodes  = $node->getElementsByTagName($key);
        foreach($childNodes as $childNode){
            return $childNode->nodeValue;
        }
    }

    /**
     * Fetches array of listeners defined in Magento config XML tree
     * @return array Array of observers and assigned listeners
     */
    public function getObservers(){
        $xml = Mage::app()->getConfig()->getNode()->asXML();

        $doc = new DOMDocument();
        $doc->loadXML($xml);

        $xpath = new DOMXpath($doc);

        $elements = $xpath->query("//observers/*");
        $arr  = array();

        foreach($elements as $element):
            $arr[$element->parentNode->parentNode->nodeName][] = array('class'=>$this->getChildNodeValue("class", $element),
                                                                       'method'=>$this->getChildNodeValue("method", $element));
        endforeach;

        return $arr;
    }
}