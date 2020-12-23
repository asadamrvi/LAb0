function init() {
  gapi.load('auth2', function() {
    gapi.auth2.init();
    /* Ready. Make a call to gapi.auth2.init or some other API */
  });
}

    function signOutt() {
      init();
      var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            
        });

        
    }
    function onSignIn(googleUser){
        var profile=googleUser.getBasicProfile();
        signOutt();
        var image=profile.getImageUrl();
        var email=profile.getEmail();
      $.post("setSession.php", {"username": email,"avatar": image});
      alert ('Bienvenido al sistema:'+email);
       window.location = 'IncreaseGlobalCounter.php';

    }
    
