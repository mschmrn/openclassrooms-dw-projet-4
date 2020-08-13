class Modal
{
    /**
     * @method logout Logout window animation
     */

     constructor()
     {
        this.logout();
        this.button();


     }

    logout()
    {
        $('#myModal').on('click', 'shown.bs.modal', function () 
        {
            $('#myInput').trigger('focus');
        })
    }

    
}