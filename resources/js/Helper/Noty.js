class Notify{

    success()
    {
        new Noty({
            type:'success',
            layout:'topRight',
            text: 'Successfully Done',
            time:100,
        }).show();
    }
    add_cart()
    {
        new Noty({
            type:'success',
            layout:'topRight',
            text: 'Cart Add To Successfully',
            time:100,
        }).show();
    }
    remove_cart()
    {
        new Noty({
            type:'success',
            layout:'topRight',
            text: 'Item Remove Successfully',
            time:100,
        }).show();
    }

    alert()
    {
        new Noty({
            type:'alert',
            layout:'topRight',
            text: 'Are You Sure?',
            time:100,
        }).show();
    }

    error()
    {
        new Noty({
            type:'error',
            layout:'topRight',
            text: 'Something went  Wrong !',
        }).show();
    }

    warning()
    {
        new Noty({
            type:'warning',
            layout:'topRight',
            text: 'Opps Wrong !',
            time:100,
        }).show();
    }

    image_validation()
    {
        new Noty({
            type:'warning',
            layout:'topRight',
            text: 'Image larger Ten 1MB !',
            time:100,
        }).show();
    }
}
export default Notify=new Notify();

