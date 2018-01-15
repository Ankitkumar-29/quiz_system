<html>
  <head>
    <title>QUIZ</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/cookiejs.js"></script>
      <script type="text/javascript" src="../js/materialize.js"></script>

      <link href="../css/style.css" rel="stylesheet" type="text/css">
      <link  rel="stylesheet" href="../fonts/icons/icon.woff2" >
      <link href="../css/materialize.css" rel="stylesheet" type="text/css">

  </head>
<body>
  <div class="card-panel Cyan col l12 s12 m12 z-depth-5">
    <div style="display:flex;color:White; font-weight:bold; font-size:20px;">QUIZ</div>
    <div class="white-text">User Name:
      <script type="text/javascript">document.write(" "+Cookies.get("fname"));</script>
    </div>
    <div class="white-text">Passkey:
      <script type="text/javascript">document.write(" "+Cookies.get("pk"));</script>
    </div>
</div>

<div class="row container">

<table  class="class col l12 s6 m12 z-depth-5 white" style="max-height:200px; overflow-y:scroll;">
  <tbody id="q_content">

  </tbody>
</table>
<div id="process" class="progress teal darken-4 col l12">
    <div class="indeterminate teal  "></div>
</div>
<div class="">
  <a id="sub" class="btn" href="#">SUBMIT</a>
</div>
</div>

</body>

<script type="text/javascript">
  $(document).ready(function(){
    $("#process").show();
    var pk= Cookies.get("pk");
    var qcount=1;
    var ans={};

    $.post("func_get_quiz.php",{
      pk:pk
      },function(data){
        $("#process").hide();
        console.log(data);

        $.each(data,function(key,value){
            var row=[];
          $("#q_content").append("<tr><td><div id='ques"+qcount+"' class='ques' style='font-weight:bold' >Q "+qcount+":<span style='margin-left:10px'>"+value['ques']+"</span></div>"+
          "<p><input name='"+qcount+"' type='radio' id='"+qcount+"a' value='o1' /><label for='"+qcount+"a'>"+value['o1']+"</label></p>"+
          "<p><input name='"+qcount+"' type='radio' id='"+qcount+"b' value='o2'/><label for='"+qcount+"b'>"+value['o2']+"</label></p>"+
          "<p><input name='"+qcount+"' type='radio' id='"+qcount+"c' value='o3'/><label for='"+qcount+"c'>"+value['o3']+"</label></p>"+
          "<p><input name='"+qcount+"' type='radio' id='"+qcount+"d' value='o4'/><label for='"+qcount+"d'>"+value['o4']+"</label></p>"+
          "<div class='divider'></div></td></tr>"
          );
            row[0]=value["q_id"];
            row[1]=value["ans"];
            row[2]="-";
            ans[qcount-1]=row;
          qcount++;
         });
         console.log(ans);
        },"json");

        $("#sub").click(function(){
          var correct=0;
          var incorrect=0;
          var pk=Cookies.get("pk");
          var user=Cookies.get("fname")
          for(var i=1;i<qcount;i++)
          {
            ans[i-1][2]=$("input[name='"+i+"']:checked").val();
          }
          for(var i=1;i<qcount;i++)
          {
            if(ans[i-1][2]==ans[i-1][1])
            {
              correct++;
            }
          }
          incorrect=qcount-correct-1;
        //  console.log(correct+" "+incorrect);
          $.post("func_fill_response.php",{
            c:correct,
            w:incorrect,
            user:user,
            pk:pk
          },function(data){
            console.log(data);
            if(data=="success"){
              Materialize.toast('SUBMITTED', 1500);
              window.open("../index.php","_self");
            }
            else {
              Materialize.toast('SOMETHING WENT WRONG', 1500);
            }
          });

        });


    });
</script>
