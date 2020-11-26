$(document).ready(function (event) {
    $("#search").click(function (e) {
 $question = $("#pregunta").val();
$.ajax({url: "../php/ClientGetQuestion.php?Question=" +  $question,
 cache: false,
 success: function(result){

    if (result[0].trim()==="") {
        $("#error").html("Autor: ... <br>Pregunta: ... <br>Respuesta correcta: ...");
    } else {

         parts = result.split(",", 3);
        
        $("#error").html('Autor: ' + parts[0] + '<br>Pregunta: ' + parts[1] + '<br>Respuesta correcta: ' + parts[2]);

    }
}});
});

});
