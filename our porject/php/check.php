<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h1>The XMLHttpRequest Object</h1>

<button type="button" onclick="loadDoc()">Get my CD collection</button>
<br><br>
<table id="demo"></table>

<script>
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




  var table="<tr><th>Autor</th><th>Enunciado</th><th>Respuesta</th></tr>";
  var x = xmlDoc.getElementsByTagName("assessmentItem");
  for (i = 0; i <x.length; i++) {
    table += "<tr><td>" +
    x[i].getAttribute("author") +
    "</td><td>" +

    x[i].getElementsByTagName("itemBody")[0].getElementsByTagName("p")[0].childNodes[0].nodeValue +
    "</td><td>" +

    x[i].getElementsByTagName("correctResponse")[0].getElementsByTagName("response")[0].childNodes[0].nodeValue +

    "</td></tr>" ;
  }
  document.getElementById("demo").innerHTML = table;
}
</script>

</body>
</html>
