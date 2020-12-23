<?php
session_start(); 
	//For first question, score will not be there.
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
 if($_POST){
	
	$total_questions=$_SESSION['$total_questions'];
	//We need to capture the question number from where form was submitted
 	$number = $_POST['number'];
	$of = $_POST['of']+1;

	

	
	//Here we are storing the selected option by user
 	$selected_choice = $_POST['choice'];
	//echo "$selected_choice";
	
	//Determine the correct choice for current question
	require_once('DbConfig.php');
	$connection=mysqli_connect($server, $user, $pass, $basededatos) or die("Connection Failed");
 	$query = "SELECT * FROM preguntas WHERE Number = '$number'";
 	 $result = mysqli_query($connection,$query);
 	 $row = mysqli_fetch_assoc($result);

 	 $correct_choice = $row['Answer'];
	 //echo ($correct_choice);
	 //What will be the next question number
		 $ids=$_SESSION['ids'];
		 $_SESSION['index']++;
		 $next = $ids[$_SESSION['index']];
	 $_SESSION['n_of']++;
	 
	 
	 //Increase the score if selected cohice is correct
			if($selected_choice===$correct_choice){
			 $_SESSION['score']++;
			// echo "Good Asad";
			}
		 //Redirect to next question or final score page. 
			if(strcmp($next,"")==0){
			 header("LOCATION: final.php");
			}else{
			header("LOCATION: SelectOptions.php?n=".$next."&of=".$of);
			
}
}
?>