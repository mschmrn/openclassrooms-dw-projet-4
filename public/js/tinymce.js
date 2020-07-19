class TinyMCE
{
    /**
     * @method eraseSignature Allows user to erase its signature
     */

    format()
    {
        $('#tinymce').tinymce(
        {
            setup : function(ed) {
                ed.onInit.add(function(ed) 
                {
                    ed.execCommand("fontName", false, "Arimo");
                    ed.execCommand("fontSize", false, "4");
                });
            }
        });
    }
}