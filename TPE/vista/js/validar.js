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
        
         },
         txtpassword: {
             validators:
             {
                 notEmpty: {
                    message:'Ingrese una Contraseña'
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
$('#contenido').bootstrapValidator({
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },
   
    fields: {

        carpeta: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre de la Carpeta'

                }

            }

        }
   }   
});