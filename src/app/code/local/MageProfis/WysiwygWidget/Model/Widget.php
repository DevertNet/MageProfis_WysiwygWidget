<?php

class MageProfis_WysiwygWidget_Model_Widget extends Mage_Widget_Model_Widget
{
    public function getWidgetDeclaration($type, $params = array(), $asIs = true)
    {
        $widget = $this->getConfigAsObject($type);
        $parameters = $widget->getParameters();
        
        //loop through widget configuration to check if one parameter is a wysiwyg field
        foreach($params as $key=>$value){
            foreach($parameters as $parameter){
                if ($parameter->getKey()==$key && $parameter->getType()=='mageprofis_wysiwygwidget/widget_wysiwyg') {
                    $params[$key] = base64_encode($params[$key]);
                }
            }
        }        

        return parent::getWidgetDeclaration($type, $params, $asIs);
    }
}