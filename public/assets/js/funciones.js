var Manteliviano = function(){
    return{
        validacionGeneral: function (id, reglas, mensajes) {
            const formulario = $('#' + id);
            formulario.validate({
                rules: reglas,
                messages: mensajes,
                errorElement: 'span',
                errorClass: 'help-block help-block-error',
                focusInvalid: false,
                ignore: "",
                highlight: function(element, errorClass, validClass){
                    $(element).closest('.form-control').addClass('is-invalid');
                },
                unhighlight: function(element){
                    $(element).closest('.form-control').removeClass('is-invalid');
                },
                success: function(label){
                    label.closest('.form-control').removeClass('is-invalid');
                },
                errorPlacement: function(error, element){
                    if($(element).is('select') && element.hasClass('bs-select')){
                        error.insertAfter(element);
                    }else if($(element).is('select') && element.hasClass('select2-hidden-accessible')){
                        element.next().after(error);
                    }else if(element.attr("data-error-container")){
                        error.appendTo(element.attr("data-error-container"));
                    }else{
                        error.insertAfter(element);
                    }
                },
                invalidHandler: function(event, validator){

                },
                submitHandler: function(form){

                    return true;

                }
            })
        },
        notificaciones: function(mensaje, titulo, tipo){
            
            
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });
       
        /*toastr.options = {
            closeButton: true,
            newestOnTop: true,
            positioClass: 'toast-top-right',
            preventDuplicates: true,
            timeOut: '5000'
            
        };*/
        if (tipo == 'success'){
            Toast.fire({
                icon: tipo, 
                title: mensaje
                });    
        }else if(tipo == 'error'){
            Toast.fire({
                icon: tipo, 
                title: mensaje});
        }else if(tipo == 'info'){
            Toast.fire({
                icon: tipo, 
                title: mensaje});
        }else if(tipo == 'warning'){
            Toast.fire({
                icon: tipo, 
                title: mensaje
                });
        }else if(tipo == 'danger'){
            Toast.fire({
                icon: tipo, 
                title: mensaje
                });
        }        
       
    },

    }

}();