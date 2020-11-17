<!DOCTYPE html>
<html>
<head>

</head>
<body>

    <div>
      <?php

       $email= $_GET['email'];
       $question= $_GET['fQuestion'];
       $correct= $_GET['fCorrecta'];
       $wrong1= $_GET['fIncorrecta1'];
       $wrong2= $_GET['fIncorrecta2'];
       $wrong3= $_GET['fIncorrecta3'];
       $complexity= $_GET['complejidad'];
       $tema= $_GET['tema'];




      if (ValidateFieldsPHP($email, $question, $correct, $wrong1, $wrong2, $wrong3, $tema, $complexity)){



        insert_in_xml($email, $question, $correct, $wrong1, $wrong2, $wrong3, $tema, $complexity);


        require_once('DbConfig.php');
        $connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
        $query="INSERT INTO `preguntas` (`Email`, `Question`, `Answer`, `IncorrectAnswer1`, `IncorrectAnswer2`, `IncorrectAnswer3`, `Complexity`, `Tema`) VALUES
        ('{$email}', '{$question}', '{$correct}', '{$wrong1}', '{$wrong2}', '{$wrong3}', '{$complexity}', '{$tema}')";
        //$result=mysqli_query($connection,$query) or die("Query Failed");
        if ($connection->query($query) === TRUE) {

          //echo("Pregunta Insertada correctamente:<a href=../php/Layout.php?email=$email&cont=1></a>");
          //echo "<script type='text/javascript'>alert('Pregunta Insertada correctamente en BD ".$mensaje."'); window.location.href = 'Layout.php?email=$email&cont=1'; </script>";
          echo "Operación realizada, la pregunta se ha guardado correctamente en la BD.";        }

         else {
          // echo mysql_errno($query) . ": " . mysql_error($query). "\n";
          // echo "Error, algo salio mal al insertar los datos en la BD. ".$mensaje." <br>";
          echo "Error, algo salio mal al insertar los datos en la BD.";

           }

          mysqli_close($connection);

          //codigo para añadir al xml

  }


      else {

        //echo "<button onclick='goBack()'>Go Back</button>

      //  <script> function goBack() {
      //  window.history.go(-1);
      //  }
      //  </script>";

      }

      function ValidateFieldsPHP($email, $pregunta, $respc, $resp1, $resp2, $resp3, $tema, $complejidad)
            {

              if (preg_match("/(((^[a-zA-Z]+)([0-9]{3})@ikasle\.ehu\.(eus|es))|((^[a-zA-Z]+)\.?([a-zA-Z]*)@ehu\.(eus|es)))$/", $email) == 0) {
                echo "Error, el servidor dice que el email no es correcto. <br>";
                return false;
              }

              if (preg_match("/.{10,}$/", $pregunta) == 0) {
                echo "Error, el servidor dice que la longitud de la pregunta no es correcta. <br>";
                return false;
              }

              if (strlen($respc) == 0 || strlen($resp1) == 0 || strlen($resp2) == 0 || strlen($resp3) == 0 || strlen($tema) == 0) {
               echo "Error, el servidor dice que hay campos vacios. <br>";
                return false;
              }

              if ($complejidad != (1 || 2 || 3)) {
                echo "Error, el servidor dice que hay un fallo en la complejidad de la pregunta. <br>";
                return false;
              }

              return true;
            }

            function goback(){
            echo "<script type='text/javascript'> window.history.go(-1);</script>";}

            function insert_in_xml($email, $question, $correct, $wrong1, $wrong2, $wrong3, $tema, $complexity){
              $assessmentItems = simplexml_load_file('../xml/Questions.xml');
              if (false === $assessmentItems) {
         return false;
          echo"No se encontro el archivo xml";
          die("");

        }
              $assessmentItem = $assessmentItems -> addChild('assessmentItem');
              $assessmentItem -> addAttribute('subject', $tema);
              $assessmentItem -> addAttribute('author', $email);

              $itemBody = $assessmentItem -> addChild('itemBody');

              $itemBody -> addChild('p', $question);

              $correctResponse = $assessmentItem -> addChild('correctResponse');
              $correctResponse -> addChild('response', $correct);


              $IncorrectResponses = $assessmentItem -> addChild('icorrectResponses');

              $IncorrectResponses -> addChild('response', $wrong1);

              $IncorrectResponses -> addChild('response', $wrong2);

              $IncorrectResponses -> addChild('response', $wrong3);
              $assessmentItems->asXML('../xml/Questions.xml');
            }





    ?>



    </div>
</body>
</html>
