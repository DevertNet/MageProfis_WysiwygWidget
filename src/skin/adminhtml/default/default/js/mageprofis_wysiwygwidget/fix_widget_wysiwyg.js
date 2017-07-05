if (typeof(WysiwygWidget)!='undefined') {
    WysiwygWidget.Widget.prototype.insertWidget = function() {
        widgetOptionsForm = new varienForm(this.formEl);

        // Trigger click on Show/Hide button to copy content from TinyMCE to textarea
        var ix = 0;
        while (typeof $(this.formEl).down('button.show-hide', ix)!='undefined') {
            $(this.formEl).down('button.show-hide', ix).click();
            ix++;
        }

        if(widgetOptionsForm.validator && widgetOptionsForm.validator.validate() || !widgetOptionsForm.validator){
            var formElements = [];
            var i = 0;
            Form.getElements($(this.formEl)).each(function(e) {
                if(!e.hasClassName('skip-submit')) {
                    formElements[i] = e;
                    i++;
                }
            });

            // Add as_is flag to parameters if wysiwyg editor doesn't exist
            var params = Form.serializeElements(formElements);
            if (!this.wysiwygExists()) {
                params = params + '&as_is=1';
            }
            
            new Ajax.Request($(this.formEl).action,
            {
                parameters: params,
                onComplete: function(transport) {
                    try {
                        widgetTools.onAjaxSuccess(transport);
                        Windows.close("widget_window");

                        if (typeof(tinyMCE) != "undefined" && tinyMCE.activeEditor) {
                            tinyMCE.activeEditor.focus();
                            if (this.bMark) {
                                tinyMCE.activeEditor.selection.moveToBookmark(this.bMark);
                            }
                        }

                        this.updateContent(transport.responseText);
                    } catch(e) {
                        alert(e.message);
                    }
                }.bind(this)
            });
        }
    };
}
