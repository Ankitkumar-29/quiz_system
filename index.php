<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
    <link href="css/materialize.css" rel="stylesheet" type="text/css">

    <link href="css/styl.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/cookiejs.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
      <link  rel="stylesheet" href="fonts/icons/icon.woff2" >
    <script type="text/javascript" src="js/materialize.js"></script>
  </head>

  <body class="cyan" style="display:flex;align-items:center">
    <div class="container row" style="margin-top:2%;">
    <div class="col s12 m6 l6 offset-m3 offset-l3 white z-depth-4">
            <div id="register_tab" class="row">
              <div class="col s12">
              <form class="login-form">
                    <div class="input-field col s12 m12 l12">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="f_name" type="text" class="validate">
                      <label for="f_name">Full Name</label>
                    </div>

                    <div class="input-field col s12">
                      <i class="material-icons prefix">school</i>
                      <input id="s_id" type="text">
                      <label for="s_id">School ID</label>
                    </div>

                    <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">book</i>
                    <input  id="cls" type="text">
                    <label for="cls">Class</label>
                    </div>

                    <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">book</i>
                    <input  id="course" type="text">
                    <label for="course">Course</label>
                    </div>

                    <div class="input-field col s12">
                      <i class="material-icons prefix">email</i>
                      <input id="email" type="email" class="validate">
                      <label for="email" data-error="Invalid">Email</label>
                    </div>

                    <div class="input-field col s12">
                      <i class="material-icons prefix">phone_android</i>
                      <input id="cell_no" type="tel">
                      <label for="cell_no">Mobile</label>
                    </div>

                    <div class="input-field col s12">
                      <i class="material-icons prefix">lock</i>
                      <input id="pk" type="text">
                      <label for="pk">Passkey</label>
                    </div>



                  <div class="row margin">
                    <div class="input-field col s12">
                      <a id="t_quiz" class="btn blue accent-2" href="#" style="width:100%;">TAKE QUIZ</a>
                    </div>
                  </div>
                </form>
            </div>
            </div>

        </div>


  </body>
    <script type="text/javascript">
    $(document).ready(function(){

        $("#t_quiz").click(function(){
        
          var email=$("#email").val();
          var fname=$("#f_name").val();
          var cell_no=$("#cell_no").val();
          var s_id=$("#s_id").val();
          var cr=$("#course").val();
          var pk=$("#pk").val();
          var cls=$("#cls").val();

          //-----Validate if all fields are filled----------------
        if(email!=""&&fname!=""&&cell_no!=""&&s_id!=""&&cr!=""&&pk!=""&&cls!=""){
          //----------Email validate
            if(validateEmail(email))
            {
              //-------Post to Php file Func_add_user.php----------
              $.post("bin/func_add_user.php",{
                  fname:fname,
                  email:email,
                  cell_no:cell_no,
                  s_id:s_id,
                  cr:cr,
                  pk:pk,
                  cls:cls
                },function(data){
                  console.log(data);
                  if(data=="success")
                  {
                    Materialize.toast('Best of luck', 1500);
                    var x=Cookies.get("pk");
                    window.open("bin/quiz.php","_self");

                  }
                  else
                  {
                    Materialize.toast('Something Went Wrong', 1000);
                  }

                });
              //---------------------------------------------------
            }
            else
            {
              Materialize.toast('Please Enter A Valid Email', 1500);
            }
          //----------------------------------------------------
        }
        else{
          Materialize.toast('Please Fill All The Fields', 1500);
        }
      //---------------------------------------------------------
        });

        //Email validate
      function validateEmail(sEmail)
      {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)){
          return true;
        }
        else
        {
            return false;
        }
      }

      });
    </script>

</html>
