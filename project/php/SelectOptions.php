<?php 
session_start();

$number = $_GET['n'];
$of = $_GET['of'];


$total_questions=$_SESSION['$total_questions'];
require_once('DbConfig.php');
$connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
$query = "SELECT * FROM preguntas WHERE Number = $number";
// Get the question
$result=mysqli_query($connection,$query) or die("Query Failed");
$question = mysqli_fetch_assoc($result); 
$ans=array($question['Answer'],$question['IncorrectAnswer1'],$question['IncorrectAnswer2'],$question['IncorrectAnswer3']);
shuffle($ans);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include '../html/Head.html' ?>
    <style media="screen">
      .center{
        height: 10m;
      
        align-items: center
      }
    </style>
  </head>
  <body>
    <?php include '../php/Menus.php' ?>
    <section class="main" id="s1">
        <div>
          <div class="current">Question <?php echo $of; ?> of <?php echo $total_questions; ?> </div>
  				<p class="question"><?php echo $question['Question']; ?> </p>
  				<form method="POST" action="process_question.php">
  					<ul class="choicess">
  						<?php 
                foreach ($ans as $choice) {
                  echo "<input type='radio' name='choice' value='".$choice."'>".$choice."</input><br>";
                    } unset($choice); ?>
  						</ul>
  					<input type="hidden" name="number" value="<?php echo $number; ?>">
            <input type="hidden" name="of" value="<?php echo $of; ?>">
  					<input type="submit" name="submit" value="Submit">
          </form>
          </div>
    </section>

    <?php include '../html/Footer.html' ?>
  </body>
</html>