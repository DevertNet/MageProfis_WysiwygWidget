<?php

class MageProfis_WysiwygWidget_Block_Widget_Wysiwyg extends Mage_Adminhtml_Block_Widget_Form_Renderer_Fieldset_Element
{
    /**
     * Updated render method for correct wysiwyg editor output
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return type
     */
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $editor = new Varien_Data_Form_Element_Editor($element->getData());

        //try to decode the value
        $content = base64_decode($editor->getValue(), true);
        
        //check if decode has successed
        $content = $content ? $content : $editor->getValue();
        
        // Prevent foreach error
        $editor->getConfig()->setPlugins(array());

        $editor->setId($element->getId());
        $editor->setForm($element->getForm());
        $editor->setWysiwyg(true);
        $editor->setForceLoad(true);
        $editor->setValue($content);

        return parent::render($editor);
    }
}