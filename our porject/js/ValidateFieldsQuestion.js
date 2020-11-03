$ (
function(){

	var email_check=false;
	var pregunta_check=false;
	var goodanswer=false;
	var inc1=false;
	var inc2=false;
	var inc3=false;
	var temaV=false;
	
	
	$("#fEmail").focusout(function(){
		checkemail();
		
	});
	$("#fQuestion").focusout(function(){
		checkpregunta();
		
	});
	$("#fCorrecta").focusout(function(){
		correctanswercheck();
		
	});
	
	$("#fIncorrecta1").focusout(function(){
		incorrectanswer1check();
		
	});
	$("#fIncorrecta2").focusout(function(){
		incorrectanswer2check();
		
	});
	$("#incorrectcheck3").focusout(function(){
		incorrectanswer3check();
		
	});
	
	
	
	
	function checkemail(){
		
		var email = $("#fEmail").val();
	 	var alumno = /^(\s)*[a-z]+[0-9]{3}(\@ikasle.ehu.){1}(eus|es){1}(\s)*$/i;
		var profesor = /^(\s)*[a-z]+(\.{1}[a-z]*)?\@ehu.{1}(eus|es){1}(\s)*$/i;
	
	    
		if (profesor.test(email) || alumno.test(email)) {
       
			$("#emailerror").hide();
			email_check=false;
      		}
	  	else{
		   	$("#emailerror").html("PLease enter a valid email");
		   	$("#emailerror").show();
		   	email_check=true;
	  }
		
	}
	function checkpregunta(){
		var pregunta=$("#fQuestion").val();
		
		if(pregunta.length<10){
			pregunta_check=true;
			 $("#preguntacheck").html("Your question must contain 10 or more characters");
			 $("#preguntacheck").show();
		}
		else{
			 $("#preguntacheck").hide();
			 pregunta_check=false;
		}
	}
	
	function correctanswercheck(){
		var answer=$("#fCorrecta").val();
		if(answer.length<1){
			goodanswer=true;
			 $("#respuestacheck").html("Your answer cannot be empty! ");
			 $("#respuestacheck").show();
			
			
		}
		else{
			goodanswer=false;
			$("#respuestacheck").hide();
			
		}
	}
	function incorrectanswer1check(){
		var answer=$("#fIncorrecta1").val();
		if(answer.length<1){
			inc1=true;
			$("#incorrectcheck1").html("Your answer cannot be empty! ");
			$("#incorrectcheck1").show();
		}
		else{
			inc1=false;
			$("#incorrectcheck1").hide();
			
		}
	}
	function incorrectanswer2check(){
	
		var answer=$("#fIncorrecta2").val();
		if(answer.length<1){
		
			inc2=true;
			 $("#incorrectcheck2").html("Your answer cannot be empty! ");
			 $("#incorrectcheck2").show();
			
			
		}
		else{
			inc2=false;
			$("#incorrectcheck2").hide();
			
		}
	}
	function incorrectanswer3check(){
		var answer=$("#fIncorrecta3").val();
		if(answer.length<1){
			inc3=true;
			 $("#incorrectcheck3").html("Your answer cannot be empty! ");
			 $("#incorrectcheck3").show();
		}
		else{
			inc3=false;
			$("#incorrectcheck3").hide();	
		}
	}
	
	function temaCheck() {
		var tema = $("#fTema").val();
		if (tema.length<1) {
			temaV = true;
			$("#temaspan").html("Your subject cannot be empty! ");
			$("#temaspan").show();
		
		}
	
		else {
		
			temaV = false;
			$("#temaspan").show();
		}
	
	}
		$("#questionForm").submit(function() {
		
			checkemail();
			checkpregunta();
			correctanswercheck();
			incorrectanswer1check();
			incorrectanswer2check();
			incorrectanswer3check();
			temaCheck();




			
			if(email_check==false && goodanswer==false && inc1==false && inc2==false && inc3==false && pregunta_check ==false && temaV==false){
				return true;
			}
			else{
				return false;
			}
    });
    });



	
	

   
