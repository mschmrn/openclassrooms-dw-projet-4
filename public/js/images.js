class Images
{
    /**
     * @method 
     */

    constructor()
    {
        this.selectImage();

        //this.fetch();
        //this.request();
        //this.htmlProvider();
        //this.test();
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