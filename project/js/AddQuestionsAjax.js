$(document).ready(function(){
  $("#insertpreg").on("click",function(){
    var email = $("#email").val();
    var pregunta=$("#fQuestion").val();
  //  console.log(pregunta, "Hello, world!");
  var answer=$("#fCorrecta").val();
  var incor1=$("#fIncorrecta1").val();
  var incor2=$("#fIncorrecta2").val();
  var incor3=$("#fIncorrecta3").val();
  var tema = $("#tema").val();
  var complejidad = $("#complejidad").val();

  $.ajax({
    url:"../php/AddQuestion.php?email="+email,
    type:"GET",
    dataType: 'text',
    data:{email:email,fQuestion:pregunta,fCorrecta:answer,fIncorrecta1:incor1,fIncorrecta2:incor2,fIncorrecta3:incor3,
      tema:tema,complejidad:complejidad},
    success:function(data){
     $("#enviar").html(data);
     loadDoc();

  },
  error: function (data) {

                $("#enviar").html(data);
                console.log(data);
            }

  });




  })
}

);
