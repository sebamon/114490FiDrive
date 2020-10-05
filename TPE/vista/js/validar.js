$('#amarchivo').bootstrapValidator({
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },
   
    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre del Archivo'

                }

            }

        },
        descripcion: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar una descripcion'

                },
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'El nombre del Guion debe ser Alfabetico' //solo para probar porque no funcionaba
 
                }

            }

        },
        usuario: {
            validators: {
                notEmpty: { // <=== Use notEmpty instead of Callback validator
                   message: 'Seleccione un usuario'
                }
             }
        },
        clave: {

            validators: {

                integer: {

                    message: 'Ingrese: 0-Alta 1:Modificacion'
                },
                notEmpty: {

                    message: 'Ingrese: 0-Alta 1:Modificacion'

                         },
                         between: {
                             min: 0,
                             max: 1,
                             message: 'Ingrese: 0-Alta 1:Modificacion'
                         }
        }
    }
   }   
});
$('#compartirarchivo').bootstrapValidator({
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },
   
    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre del Archivo'

                }

            }

        },
        cantidad_dias: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un valor'

                },
                integer:
                {
                    message: 'Debe ser valor numerico'
                }

            }

        },
        cantidad_descargas: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un valor'

                },
                integer:
                {
                    message: 'Debe ser valor numerico'
                }

            }

        },

        descripcion: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar una descripcion'

                },
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'El nombre del Guion debe ser Alfabetico' //solo para probar porque no funcionaba
 
                }

            }

        },
        usuario: {
            validators: {
                notEmpty: { // <=== Use notEmpty instead of Callback validator
                   message: 'Seleccione un usuario'
                }
             }
        }
    
    }   
});
$('#eliminararchivo').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },
   
    fields: {
        motivo: {
            validators: {

                notEmpty: {

                    message: 'El Motivo no puede quedar vacío'

                }

            }

        },
        usuario: {
            validators: {
                notEmpty: { // <=== Use notEmpty instead of Callback validator
                   message: 'Seleccione un usuario'
                }
             }
        }
        }


});