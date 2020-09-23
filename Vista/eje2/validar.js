$('#formulario2').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        lunes: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }

            }

        },
        martes: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }

            }

        },
        miercoles: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }

            }

        },
        jueves: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }

            }

        },
        viernes: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }

            }

        }
    
    }   
});
