
  $(document).on( 'click', '#btnSignin', function(e){
    e.preventDefault();
    loginSession();
  });

  function loginSession()
  {
    // var isLogged = false;
    var result = function (response)
    {
       if(response)
       {
         $(".inputPasswordMessageWrong").css({"display":"none"});
         window.location.href = 'admin';
       }
       else  //invalid login
          $(".inputPasswordMessageWrong").css({"display":"block"});
    };
    var postData = {
      //action: 'get_session'
      action: 'login_session',
      user: $( inputUser ).val(),
      psw: $( inputPassword ).val(),
      per: $( dropdownSucursal ).val()
    };
    execAsyncAjax(postData,"login/login_session", result);
  }

  function execAsyncAjax(postData, url, funcAction)
  {

    $.ajax( {
      type: "POST",
      data: postData,
      dataType: "json",
      async: true,
      url: url,
      success: funcAction
    }).fail( function ( data ) {
      if ( window.console && window.console.log ) {
        console.log( data );
      }
    });
  }
