class Ajax
{
    /**
     * @method 
     */

    constructor()
    {      
        this.get_images();
        this.images_options();

        //this.fetch();
        //this.request();
        //this.htmlProvider();
        //this.test();

        this.apiKey = 'LWTE7Qs3-PXo38YWLlKnXoypsn6xGLK7Vr2HR93jua0';
        this.per_page = '4';
        this.page = Math.floor(Math.random() * 10) ;
    }

    images_options()
    {
        $('.testJS').click(function() 
        {            
            $('.select-image').remove();

            console.log('ok');
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

    get_images()
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

}