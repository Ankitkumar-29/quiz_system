<div class="card-panel Cyan col l12 s12 m12">
  <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">SCHOOLS</div>
</div>
<div class="col white l12 s12 m6">
  <table id="sc" class="bordered">
    <thead id="sc_h">
      <th>School ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Town</th>
      <th>Phone No</th>
      <th>Email</th>
      <th>Principle</th>
  </thead>
    <tbody id="sc_body">

    </tbody>
  </table>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#proces").hide();

  var chk=0;
  $.post("func_get_school.php",{
      },function(data){
        var row=0;
        var col=0;
      //  console.log(data);

        $("#sc_body").empty();
        $.each(data,function(key,value){
          var r=[];
          var r1=[];
          col=0;


          $("#sc_body").append("<tr>");
        $.each(value,function(colname,colvalue){
                //console.log(colvalue);
              $("#sc_body").append(
              "<td>"+
              "<span class='block tech' data-value='"+colvalue+"' data-row='"+row+"' data-col='"+col+"' >"+colvalue+"</span>"+
              "</td>" );
            });
        $("#sc_body").append("</tr>");
        });

      },"json");
  });
</script>
