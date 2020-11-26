$(document).ready(function (event) {

    $("form input").change(function comprobar() {
        $("#Boton").attr("disabled", true);
        $email = $('#email');
        //  alert("asad"+$email.val());
        $.ajax({
            url: "ClientVerifyEnrollment.php?email=" + $email.val(), cache: false,
            success: function (result) {
                        //  alert(result);
                if (result == "SI") {
                    $("#mail").html("Email VIP");
                      $("#Boton").attr("disabled", false);

                } else {
                    $("#mail").html("Email no VIP");
                }
            }
        });
    });
});
