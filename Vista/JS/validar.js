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


