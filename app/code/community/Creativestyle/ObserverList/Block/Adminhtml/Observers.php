<?php
class Creativestyle_ObserverList_Block_Adminhtml_Observers extends  Mage_Adminhtml_Block_Abstract implements Varien_Data_Form_Element_Renderer_Interface
{
    public function __construct(){
        $this->setTemplate("creativestyle_observerlist/list.phtml");
    }

    public function render(Varien_Data_Form_Element_Abstract $element){
        return Mage::app()->getLayout()->createBlock('Mage_Core_Block_Template', 'CS_Infoblock', array('template' => 'creativestyle_observerlist/list.phtml'))->toHtml();
    }
}