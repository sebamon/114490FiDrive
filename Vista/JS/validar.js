$('#formulario').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

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

                },
                integer:{
                        message: 'El valor debe ser numerico'
                }

            }

        },
        martes: {

            validators: {

                integer:{
                    message: 'El valor debe ser numerico'
            },
                notEmpty: {

                    message: 'Debe Ingresar un Número'

                }
                

            }

        },
        miercoles: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                },
                integer:{
                        message: 'El valor debe ser numerico'
                }

            }

        },
        jueves: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                },
                integer:{
                        message: 'El valor debe ser numerico'
                }

            }

        },
        viernes: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                },
                integer:{
                        message: 'El valor debe ser numerico'
                }

            }

        }
    
    }   
});
$('#formulario3').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-hand-paper',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre'

                },
                
                regexp: {

                   regexp: /[a-zA-Z ]{2,254}/,

                   message: 'El nombre solo puede contener letras'

               }

            }

        },
        apellido: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Apellido'

                },
                
                regexp: {

                   regexp: /[a-zA-Z ]{2,15}/,

                   message: 'El apellido solo puede contener letras'

               }

            }

        },
        edad: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Edad'

                },
                stringLength: {
                    max: 3,
                    message: 'La edad no puede tener mas de 3 cifras'
                }                 

            }

        },
        direccion: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Direccion'

                }

            }

        },
    
    }   
});
$('#formulario4').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-times',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre'


                },
                
				 regexp: {

                    regexp: /[a-zA-Z ]{2,254}/,

                    message: 'El nombre solo puede contener letras'

                }

            }

        },
        apellido: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Apellido'

                },
                
                regexp: {

                   regexp: /[a-zA-Z ]{2,15}/, //de la a la z, de la A a la Z, minimo 2 maximo 15

                   message: 'El apellido solo puede contener letras'

               }
               


            }

        },
        edad: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Edad'

                },
                stringLength: {
                    max: 3,
                    message: 'La edad no puede tener mas de 3 cifras'
                }


                

            }

        },
        direccion: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Direccion'

                }

            }

        },
    
    }   
});
$('#formulario5').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-times',

        validating: 'fa fa-circle'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Nombre'


                },
                
				 regexp: {

                    regexp: /[a-zA-Z ]{2,254}/,

                    message: 'El nombre solo puede contener letras'

                }

            }

        },
        apellido: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar el Apellido'

                },
                
                regexp: {

                   regexp: /[a-zA-Z ]{2,15}/, //de la a la z, de la A a la Z, minimo 2 maximo 15

                   message: 'El apellido solo puede contener letras'

               }
               


            }

        },
        edad: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Edad'

                },
                stringLength: {
                    max: 3,
                    message: 'La edad no puede tener mas de 3 cifras'
                },
                between: {
                    min: 1,
                    max: 110,
                    message: 'La edad debe ser menor a 110 Años'
                }


                

            }

        },
        direccion: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Direccion'

                }

            }

        },
        radioEstudio: {
            validators: {

                notEmpty: {

                    message: 'Debe Ingresar los estudios alcanzados'

                }

            }
        },
        genero: {
            validators: {

                notEmpty: {

                    message: 'Debe Ingresar la Genero'

                }

            }
        }
    
    }   
});
$('#formulario7').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },

    fields: {

        primervalor: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                },
                integer:
                {
                    message: 'El valor debe ser numerico'
                }
            }

        },
        segundovalor: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                },
                integer:
                {
                    message: 'El valor debe ser numerico'
                }
     

            }

        }
    
    }   
});
$('#formulario8').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },

    fields: {

        edad: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar un Número'

                },
                integer:
                {
                  message: 'El valor debe ser Numerico'
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

                    message: 'Debe Ingresar un Nombre de Usuario'

                },


            }

        },
        password: {

            validators: {

                notEmpty: {

                    message: 'Debe Ingresar una Contraseña'

                },
                different:
                {
                    field:'username',
                    message: 'El password no puede ser el mismo que el username'
                },
                stringLength: {
                    min:8,
                    message: 'El password no debe ser menor a 8 caracteres'
                },
                regexp:
                {
                    regexp:"^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,}",
                    message: "Debe ingresar una contraseña mas segura"
                }

            }

        }
    
    }   
});
$('#formularioCinema').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'fa fa-check',

        invalid: 'fa fa-time',

        validating: 'fa fa-refresh'

    },

    fields: {

        titulo: {

            validators: {

                notEmpty: {

                    message: 'Ingrese Titulo'

                }

            }

        },
        actores:{

            validators: {

                notEmpty: {

                    message: 'Ingrese Actores'

                },
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'El nombre de los Actores debe ser Alfabetico'
 
                }
                

            }

        },
        director:{

            validators: {

                notEmpty: {

                    message: 'Ingrese Diretor'

                },
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'El del director debe ser Alfabetico'
 
                }

            }

        },
        guion:{

            validators: {

                notEmpty: {

                    message: 'Ingrese Guión'

                }
                ,
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'El nombre del Guion debe ser Alfabetico'
 
                }

            }

        },
        produccion:{

            validators: {

                notEmpty: {

                    message: 'Ingrese Produccion'

                },
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'El nombre de Produccion debe ser Alfabetico'
 
                }

            }

        },
        anio:
        {

            validators: {

                notEmpty: {

                    message: 'Ingrese Año'

                },
                integer:
                {
                    min: 1900,
                    message: 'Ingrese un año en formato YYYY y mayor a 1900'
                },
                stringLength:
                {
                    message: 'Utilice 4 digitos para el Año',
                    min:4,
                    max:4
                    
                },
                between:
                {
                    min: 1900,
                    max: 2021,
                    message: 'Rango de Año Permitido 1900-2021'
                }


            }

        },
        nacionalidad:{

            validators: {

                notEmpty: {

                    message: 'Ingrese Nacionalidad'

                },
                regexp: {

                    regexp: /[a-zA-Z ]{2,254}/, //de la a la z, de la A a la Z, minimo 2 maximo 15
 
                    message: 'La Nacionalidad debe ser Alfabetico'
 
                }

            }

        },
     duracion:{

        validators: {

            notEmpty: {

                message: 'Ingrese Duracion en minutos'

            },
            integer:
            {
                massage:'Ingrese Duracion en minutos'
            }
            

        }

    },
    sinopsis:
    {

        validators: {

            notEmpty: {

                message: 'Ingrese Sinopsis'

            }

        }

    }

    
    }   
});