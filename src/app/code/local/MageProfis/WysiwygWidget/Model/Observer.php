<?php
/**
 * Description of Observer
 *
 * @author volker
 */
class MageProfis_WysiwygWidget_Model_Observer
{
    public function addAdminhtmlLayoutXml($event)
    {
        $xml = $event->getUpdates()->addChild('mageprofis_wysiwygwidget_design');
        $xml->addAttribute('module', 'MageProfis_WysiwygWidget');
        $xml->addChild('file', 'mageprofis_wysiwygwidget.xml');
    }
}