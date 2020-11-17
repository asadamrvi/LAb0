<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style media="screen">
table,thead,tbody,td,th {
  border: 2px solid black;
}
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <h2> Preguntas</h2><br>


<?php
$assessmentItems = simplexml_load_file('../xml/Questions.xml');

if (false === $assessmentItems) {
        echo"No se encontro el archivo xml";
        echo "<a href='javascript:window.history.go(-1)'>Vuelve atras</a>";
        die("");

      }

?>
<table cellpadding="2" cellspacing="3" border="2">

<tr>
	<th> Autor </th>
	<th> Enunciado </th>
	<th> Respuesta </th>
</tr>

<?php foreach ($assessmentItems->assessmentItem as $assessmentItem){ ?>
	<?php foreach ($assessmentItem->itemBody as $itemBody) {?>
	<?php foreach ($assessmentItem->correctResponse as $correctResponse) {?>
	<tr>

		<td><?php echo $assessmentItem['author']; ?></td>
		<td><?php echo $itemBody -> p; ?></td>
		<td><?php echo $correctResponse -> response; ?></td>

	</tr>

<?php } ?>
<?php } ?>
<?php } ?>
</table>

</div>
  </section>

  <?php include '../html/Footer.html' ?>

</body>
</html>
