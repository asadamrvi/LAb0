//var test1=false;
$(document).ready(function (event) {




    $("form input").change(function comprobar() {
        $("#Boton").attr("disabled", true);

                                    var contrasena = $("#password").val();
                                    var contrasena_rep = $("#passwordr").val();
                                    //alert(contrasena);

                    if ($("#password").val().trim().length >= 6) {
                        var $ticket = 1010;

                        $.ajax({
                          url: "clientpasscheck.php?cont=" + $("#password").val() + "&ticket=" + $ticket,
                            cache: false,
                            datatype: "html",
                            success: function (res) {
                              //alert(res);
                                if (res.trim() == "VALID") {

                                    $("#pass").html("Contraseña VÁLIDA");




                                    if (contrasena.trim().length >= 6  && contrasena.trim() == contrasena_rep.trim()) {

                                      if(test1==true){$("#Boton").attr("disabled", false);}

                                    }
                                    else {
                                        $("#Boton").attr("disabled", true);
                                        $("#pass").html("Contraseñas no coinciden");

                                    }
                                } else {
                                //	alert(contrasena);
                                    $("#pass").html("Contraseña no VÁLIDA");
                                }
                            },
                            error:function(res){
                            	alert(res);
                            }
                        });
                    }



    });
});
