<!DOCTYPE html>
<html>
<head>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

    <h2>Aplicación desarollada por autores listados abajo</h2>
    <br><br><br>
    <table>
  <tr>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Especialización</th>
    <th>Correo electronico</th>
    <th>Foto</th>
  </tr>
  <tr>
    <td>Hasib</td>
    <td>Murib</td>
    <td>IS</td>
    <td>humurib001@ikasle.ehu.eus</td>
    <td><img src="../images/Hasib.png" style="width:125px"></td>
  </tr>
  <tr>
    <td>Asad</td>
    <td>Hayat</td>
    <td>IS</td>
    <td>ahayat001@ikasle.ehu.eus</td>
    <td><img src="../images/img5.jpg" style="width:125px"></td>
  </tr>
</table>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
