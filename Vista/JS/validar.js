$('#formulario').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        numero: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }

            }

        }
    
    }   
});
