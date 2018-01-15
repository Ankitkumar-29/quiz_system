<div class="card-panel Cyan col l12 s12 m12">
  <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">CREATE QUIZ</div>
</div>
<div class="row margin">
  <div class="input-field col s12">
    <input id="pkey" type="text">
    <label for="pkey">Passkey</label>
  </div>
</div>
<div class="row margin">
  <div class="input-field col s12">
    <input id="nm" type="text">
    <label for="nm">No of Marks</label>
  </div>
</div>
<div class="row margin">
  <div class="input-field col s12">
    <input id="pm" type="text">
    <label for="pm">Passing Marks</label>
  </div>
</div>

<div class="col white l12 s12 m6">
  <table id="questions" class="bordered">
    <thead id="ques_h">
      <th>ADD</th>
      <th>ID</th>
      <th>QUESTION</th>
  </thead>
    <tbody id="ques_body">

    </tbody>
  </table>
</div>
<div id="proces" class="progress teal darken-4 col l12">
    <div class="indeterminate teal "></div>
</div>
<div class="col l12 s12 m12">
  <button id="generate" class="btn" type="button" name="button">Submit</button>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#proces").hide();
  var jason={};
  var quesjson={};
  var chk=0;
  $.post("func_get_ques.php",{
      },function(data){
        var row=0;
        var col=0;
      //  console.log(data);

        $("#ques_body").empty();
        $.each(data,function(key,value){
          var r=[];
          var r1=[];
          col=0;
          chk=0;

          $("#ques_body").append("<tr>");
        $.each(value,function(colname,colvalue){
                //console.log(colvalue);
        if(col==0){
        $("#ques_body").append("<td><input type='checkbox' class='sendtocb' id='"+colvalue+"cb"+"' unchecked/>"+
        "<label for='"+colvalue+"cb"+"'></label></td>");
        }

        if(chk<=1){
            $("#ques_body").append(
              "<td>"+
              "<span class='block tech' data-value='"+colvalue+"' data-row='"+row+"' data-col='"+col+"' >"+colvalue+"</span>"+
              "</td>" );
            //  console.log(colvalue);
              r[col]=colvalue;
              r1[col]=colvalue;
              col++;
              chk++;
            }
          });
          r1[2]=0;
          quesjson[row]=r1;
          jason[row]=r;
          //console.log(jason);
          row=row+1;
        $("#ques_body").append("</tr>");
        });
      //console.log(quesjson);

      add_to_quiz(quesjson);
      },"json");

      function add_to_quiz(quesjson)
      {
        $(".sendtocb").click(function(){
        //  alert("sadasdas");
             $.each(quesjson,function(key,value){
               if($("#"+value[0]+"cb")[0].checked)
                {
                  value[2]=1;
                  //console.log(quesjson);
                }
                else{
                  value[2]=0;
                  //console.log(quesjson);
                }
            });
      });
      }


      $("#generate").click(function(){
        $("#proces").show();
        var pk=$("#pkey").val();
        var pm=$("#pm").val();
        var nm=$("#nm").val();
        $.post("func_create_quiz.php",{
          qj:quesjson,
          pk:pk,
          pm:pm,
          nm:nm
          },function(data){
          console.log(data);
         $("#proces").hide();
         if(data=="success")
         {
            Materialize.toast('QUIZ CREATED', 1500);
         }
         else {
            Materialize.toast('SOMETHING WENT WRONG', 1500);
         }
        });
      });
});
</script>
