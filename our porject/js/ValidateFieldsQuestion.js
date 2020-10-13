$(document).ready(function() {

  $('#questionForm').submit(function(e) {
    e.preventDefault();
    var email = $('#fEmail').val();
    var question = $('#fQuestion').val();
    var correct = $('#fCorrecta').val();
    var incorrect1 = $('#fIncorrecta1').val();
    var incorrect2 = $('#fIncorrecta2').val();
    var inocrrect3 = $('#fIncorrecta3').val();
    var alumno = var alumno = /^(\s)*[a-z]+[0-9]{3}(\@ikasle.ehu.){1}(eus|es){1}$/i;
    var profesor = var profesor = /^(\s)[a-z]+\.[a-z]*\@ehu.{1}(eus|es){1}$/i;

    $(".error").remove();

    if (email.length < 1) {
      //$('#first_name').after('<span class="error">This field is required</span>');
      alert("Introduzca un correo electronico válido!");
    }

    else if (
    if (question.length < 11) {
      //$('#last_name').after('<span class="error">This field is required</span>');
      alert("Introduzca un correo electronico válido!");
    }
    if (email.length < 1) {
      $('#email').after('<span class="error">This field is required</span>');
    } else {
      var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $('#email').after('<span class="error">Enter a valid email</span>');
      }
    }
    if (password.length < 8) {
      $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
    }
  });

});
