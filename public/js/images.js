class Images
{
    /**
     * @method selectImage Allow to select cover image for an article
     */

    constructor()
    {
        this.selectImage();
    }

    selectImage()
    {
        $('#cardimages').on('click', '.select-image', function() 
        {   
            $('#photo').prop('value',this.src);
            $(this).addClass('img-opacity').siblings().removeClass('img-opacity');
        });
    }

}