class Ajax
{
    /**
     * @method get_images Unsplash API connection to get images
     * @method images_options API connection auto-refresh based on keyword selection
     */

    constructor()
    {      
        this.getImages();
        this.imagesOptions();
    }

    getImages()
    {
        let query = "Alaska";
        let apiKey = 'LWTE7Qs3-PXo38YWLlKnXoypsn6xGLK7Vr2HR93jua0';
        let per_page = '4';
        let page = Math.floor(Math.random() * 10) ;
       
        let dataURL = 'https://api.unsplash.com/search/photos?query='+ query +'&per_page='+ per_page +'&page='+ page +'&client_id='+ apiKey +'';

        $.getJSON(dataURL, function(data)
        {    
            let item = data.results; 
            $.each(item, function(i, val) 
            {
                let image = val;
                let imageURL = val.urls.regular;
                let imageWidth = val.width;
                let imageHeight = val.height;

                if (imageWidth > imageHeight) 
                {
                    $('#cardimages').append('<img class="select-image" src="'+ imageURL +'">');            
                } 
            });  
        });
    }

    imagesOptions()
    {
        $('span.textJS').click(function() 
        {            
            $('.select-image').remove();

            let query = $(this).text();
            let page = Math.floor(Math.random() * 10) ;
            let dataURL = 'https://api.unsplash.com/search/photos?query='+ query +'&per_page=4&orientation=landscape&page='+ page +'&client_id=LWTE7Qs3-PXo38YWLlKnXoypsn6xGLK7Vr2HR93jua0';

            $.getJSON(dataURL, function(data)
            {    
                let item = data.results; 
                $.each(item, function(i, val) 
                {
                    let imageURL = val.urls.regular;
                    $('#cardimages').append('<img class="select-image" src="'+ imageURL +'">'); 
                });  
            });
        })
    }

}