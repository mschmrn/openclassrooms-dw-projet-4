class Nav
{
    /**
     * @method eraseSignature Allows user to erase its signature
     */

     constructor()
     {
         this.check();
     }

    check()
    {
        $(".nav-link").click(function() 
        {
            document.getElementsByClassName('nav-link').style.color = white;
        });
    }
}