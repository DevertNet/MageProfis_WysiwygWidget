# MageProfis_WysiwygWidget
Add a wysiwyg editor to a widget field.

### Usage

Example for the **type** in your widget.xml
```xml
<?xml version="1.0"?>
<widgets>
    <custom_modulename type="custom/widget" translate="label description" module="modulename">
        <name>Widget Name</name>
        <parameters>
            <text>
                <label>Your Text</label>
                <type>mageprofis_wysiwygwidget/widget_wysiwyg</type>
            </text>
        </parameters>
    </custom_modulename>
</widgets>    
```

The wysiwyg content is base64 encoded. You can use this snipped to output your content:
```php
$raw = $this->getData('text');
$content = base64_decode($raw, true);
return Mage::helper('cms')->getPageTemplateProcessor()->filter($content ? $content : $raw);
```