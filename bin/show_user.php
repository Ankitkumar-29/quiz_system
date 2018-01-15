<div class="input-field col s12 l6 m6">
    <label for="srch">User ID</label>
    <input id='srch' class="autocomplete search"  type="text" name="" value="">
  </div>
<div class="col s6 l6 m6">
    <a id="select" class="btn" >SELECT</a>
  </div>

  <div class="row" >
  <div class="col s12">
    <table id="tbl" class="bordered">

      <thead id="tbl_head">
        <th>ID</th>
        <th>Name</th>
        <th>School ID</th>
        <th>Phone No</th>
        <th>Email</th>
        <th>Course</th>
        <th>Class</th>
      </thead>
      <tbody id="t_body">

      </tbody>
  </table>

  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$(".search").keyup(function(e) {
    if(e.key.length==1){
    srch=$(".search").val();
    }
    else {
      srch=$(this).val();
    }
  $.post("func_user_search.php",{key:srch},function(content){
    $('input.autocomplete').autocomplete({
      data:content,
      limit: 3, // The max amount of results that can be shown at once. Default: Infinity.
      minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
      });
  },"json");
});

$('#select').click(function(){
  var user;
  user =$("#srch").val();
  $.post("func_get_user.php",{
      u:user
      },function(data){
        var row=0;
        var col=0;
      //  console.log(data);

        $("#t_body").empty();
        $.each(data,function(key,value){
          var r=[];
          var r1=[];
          col=0;


          $("#t_body").append("<tr>");
        $.each(value,function(colname,colvalue){
                //console.log(colvalue);
              $("#t_body").append(
              "<td>"+
              "<span class='block tech' data-value='"+colvalue+"' data-row='"+row+"' data-col='"+col+"' >"+colvalue+"</span>"+
              "</td>" );
            });
        $("#t_body").append("</tr>");
        });

      },"json");
  });
});
</script>
