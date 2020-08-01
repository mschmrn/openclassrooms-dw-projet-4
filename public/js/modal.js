class Modal
{
    /**
     * @method eraseSignature Allows user to erase its signature
     */

     constructor()
     {
        this.logout();
        this.test();
     }

    logout()
    {
        $('#myModal').on('shown.bs.modal', function () 
        {
            $('#myInput').trigger('focus');
        })
    }

    test()
    {
        document.getElementById('test').addEventListener('click', () =>
        {
            document.getElementById('chapter').removeAttribute('readonly');
        })
    }
    
}