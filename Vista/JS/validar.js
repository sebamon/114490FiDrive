$('#amarchivo').bootstrapValidator({
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },
   
    fields: {

        acnombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre del Archivo'

                }

            }

        },
        acdescripcion: {

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
        },acicono: {

            validators: {

                notEmpty: {

                    message: 'Debe Seleccionar un Icono'

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
         },
         link: {
             validators:
             {
                 notEmpty: {
                     message:'Genere Hash antes de Continuar'
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
$('#usuario').bootstrapValidator({
    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },
   
    fields: {

        usnombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre de la Persona'

                }

            }

        },
        usapellido: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Apellido de la Persona'

                }

            }

        },
        uslogin: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre de Usuario'

                }

            }

        },
        usmail: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Email del Usuario'

                }

            }

        },
        usclave: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar Password'

                }

            }

        },
        usclave2: {

            validators: {

                notEmpty: {

                    message: 'Debe Repetir Password'

                },  identical: {
                    compare: function() {
                        return form.querySelector('[name="usclave"]').value;
                    },
                    message: 'El Password debe coincidir'
                }

            }

        },
        rol: {

            validators: {

                notEmpty: {

                    message: 'Debe Seleccionar un Rol'

                }

            }

        }
    }
    });
    $('#login').bootstrapValidator({
        message: 'Este valor no es valido',
    
        feedbackIcons: {
    
            valid: 'fa fa-check',
    
            invalid: 'fa fa-time',
    
            validating: 'fa fa-refresh'
    
        },
       
        fields: {
    
            username: {
    
                validators: {
    
                    notEmpty: {
    
                        message: 'Ingrese Username'
    
                    }
    
                }
    
            },
            clave:{
                validators:{
                    notEmpty:{
                        message: 'Ingrese Password'
                    }
                }
            }
        }
    });
