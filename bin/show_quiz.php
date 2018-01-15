<div class="card-panel Cyan col l12 s12 m12">
  <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">ALL QUIZES</div>
</div>
<div class="col white l12 s12 m6">
  <table id="q" class="bordered">
    <thead id="q_h">
      <th>ID</th>
      <th>PassKey</th>
      <th>No Of Ques</th>
      <th>Passing Marks</th>
      <th>Marks Per Ques</th>
    </thead>
    <tbody id="q_body">

    </tbody>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#proces").hide();

  var chk=0;
  $.post("func_get_allquiz.php",{
      },function(data){
        var row=0;
        var col=0;
      //  console.log(data);

        $("#q_body").empty();
        $.each(data,function(key,value){
          var r=[];
          var r1=[];
          col=0;


          $("#q_body").append("<tr>");
        $.each(value,function(colname,colvalue){
                //console.log(colvalue);
              $("#q_body").append(
              "<td>"+
              "<span class='block tech' data-value='"+colvalue+"' data-row='"+row+"' data-col='"+col+"' >"+colvalue+"</span>"+
              "</td>" );
            });
        $("#q_body").append("</tr>");
        });

      },"json");
  });
</script>
