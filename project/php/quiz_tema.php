<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <script src="../js/jquery-3.4.1.min.js"></script>
     <?php include '../html/Head.html' ?>
     <title></title>
   </head>
   <body>
     <?php include '../php/Menus.php' ?>
     <section class="main" id="s1">
         <div>
                  <div class="temaSelect">
             
             <section>
                 <div class="Temas">
                   

                   <form class="tema_select" action="tema-Solver.php" method="post">
                     <label for="cars">Choose a Tema:</label>
                     <select name="selected_tema">
                       <?php 
                       require_once('DbConfig.php');
                       $connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
                       $query="SELECT DISTINCT Tema FROM `preguntas`";
                       $result=mysqli_query($connection,$query) or die("Query Failed");
                       if(mysqli_num_rows($result)>0){
                         
                         while ($row=mysqli_fetch_assoc($result)) {
                           
                           echo "<option name='selected_tema' value='".$row['Tema']."'>".$row['Tema']."</option>";
                         }
                       }
                        ?>
                         </select>
                     <br>
                     <br>
                     <br>
                     <button type="submit" name="temaSelect">Show Me With This</button>
                   </form>
                     <?php  ?>
                 </div>
                 </section>
           </div>
         </div>
     </section>

     <?php include '../html/Footer.html' ?>
   </body>
 </html>
 