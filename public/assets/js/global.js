const message = {
    success: {
        show(text){
            $(".alert.alert-success").html(text).fadeIn(100);
            setTimeout(() => {
                message.success.hide();
            }, 3000)
        },
        hide(){
            $(".alert.alert-success").html("").fadeOut(100);
        }
    },
    danger: {
        show(text){
            $(".alert.alert-danger").html(text).fadeIn(100);
            setTimeout(() => {
                message.danger.hide();
            }, 3000)
        },
        hide(){
            $(".alert.alert-danger").html("").fadeOut(100);
        }
    }
};
