<div class="card-panel Cyan col l12 s12 m12">
  <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">ALL RESPONSES</div>
</div>
<div class="col white l12 s12 m6">
  <table id="r" class="bordered">
    <thead id="r_h">
      <th>User ID</th>
      <th>Quiz ID</th>
      <th>Correct</th>
      <th>Incorrect</th>
      <th>Result</th>
      <th>Date-Time</th>
    </thead>
    <tbody id="r_body">

    </tbody>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#proces").hide();

  var chk=0;
  $.post("func_get_allres.php",{
      },function(data){
        var row=0;
        var col=0;
      //  console.log(data);

        $("#r_body").empty();
        $.each(data,function(key,value){
          var r=[];
          var r1=[];
          col=0;


          $("#r_body").append("<tr>");
        $.each(value,function(colname,colvalue){
                //console.log(colvalue);
              $("#r_body").append(
              "<td>"+
              "<span class='block tech' data-value='"+colvalue+"' data-row='"+row+"' data-col='"+col+"' >"+colvalue+"</span>"+
              "</td>" );
            });
        $("#r_body").append("</tr>");
        });

      },"json");
  });
</script>
