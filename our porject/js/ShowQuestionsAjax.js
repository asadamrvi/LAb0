



function rese(){
  document.getElementById("err").innerHTML = "";
  document.getElementById("enviar").innerHTML = "";

}
function loadDoc() {
  var xhttp = new XMLHttpRequest();

  xhttp.open("GET", "../xml/Questions.xml", true);
  xhttp.send();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      myFunction(xhttp);
    }
  };
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;




  var table="<table><tr class='row'><th  class='row'>Autor</th><th class='row'>Enunciado</th><th  class='row'>Respuesta</th></tr>";
  var x = xmlDoc.getElementsByTagName("assessmentItem");
  for (i = 0; i <x.length; i++) {
    table += "<tr class='row'><td class='row'>" +
    x[i].getAttribute("author") +
    "</td><td class='row'>" +

    x[i].getElementsByTagName("itemBody")[0].getElementsByTagName("p")[0].childNodes[0].nodeValue +
    "</td><td class='row'>" +

    x[i].getElementsByTagName("correctResponse")[0].getElementsByTagName("response")[0].childNodes[0].nodeValue +

    "</td></tr>" ;
  }
  table+="</table>";
  document.getElementById("err").innerHTML = table;
}
