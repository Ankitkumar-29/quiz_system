<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
    <link href="../css/materialize.css" rel="stylesheet" type="text/css">
  <link  rel="stylesheet" href="../fonts/icons/icon.woff2" >
    <link href="../css/styl.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>
  </head>

  <body class="cyan" style="display:flex;align-items:center;justify-content:center;">
    <div id="login-page" class="row">

        <div class="col l12 s12 white z-depth-4">

          <form class="login-form">

            <div class="row">
              <div class="input-field col s12 center">
                <img src="sources/images/logos/logoiimt.png" alt="Logo Image" class="responsive-img">
                <span class="col s12 l12 m12">ADMIN LOGIN</span>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="first_name" type="text">
                <label for="first_name">UserID</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="password" type="password">
                <label for="password">Password</label>
              </div>
            </div>

            <div id="login-msg-div" class="row">
              <div class="input-field col s12" style="margin-top:0px;display:flex;flex-direction:row-reverse">
                <span><a id="forgot-msg" href="#" class="red-text">Forgot Password?</a></span>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <a id="submit_button" class="waves-effect waves-light btn" style="width:100%">Login</a>
              </div>
            </div>

          </form>
        </div>
      </div>



  </body>
    <script type="text/javascript">
    $(document).ready(function(){

        $("#submit_button").click(function(){
          var  id=$("#first_name").val();
          var  pass=$("#password").val();
          //alert(id +" "+pass)
            $.post("func_login.php",{
                id:id,
                pass:pass
              },function(data){
                console.log(data);
                if(data=="success")
                {
                    Materialize.toast('You Are Successfully Logged IN', 1500);
                    window.open("adminpanel.php","_self");
                }
                else if(data=="invalid") {
                    Materialize.toast('Please Enter Valid Details', 1500);
                }
                else {
                    Materialize.toast('Please Enter All Details', 1500);
                }
              });
          });




      });
    </script>

</html>
