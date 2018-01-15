<div class="input-field col s12 l6 m6">
    <label for="srchs">Quiz Passkey</label>
    <input id='srchs' class="autocomplete search"  type="text" name="" value="">
  </div>
<div class="col s6 l6 m6">
    <a id="selects" class="btn" >SELECT</a>
</div>

<div class="row container">

<table  class="class col l12 s6 m12 z-depth-5 white" style="max-height:200px; overflow-y:scroll;">
  <tbody id="qz_content">

  </tbody>
</table>

</div>
</body>

<script type="text/javascript">
  $(document).ready(function(){
    var srch ="";

    $(".search").keyup(function(e) {
        if(e.key.length==1){
         srch=$(".search").val();
        }
        else {
          srch=$(this).val();
        }
      $.post("func_quiz_search.php",{key:srch},function(content){
        $('input.autocomplete').autocomplete({
          data:content,
          limit: 3, // The max amount of results that can be shown at once. Default: Infinity.
          minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
          });
      },"json");
    });

    $('#selects').click(function(){
      var pk;
      pk =$("#srchs").val();
      var count=1;


      $.post("func_get_quiz.php",{
      pk:pk
      },function(data){

        console.log(data);
        $("#qz_content").empty();
        $.each(data,function(key,value){
        var x =value['ans'];
          $("#qz_content").append("<tr><td><div id='ques"+count+"' class='ques' style='font-weight:bold' >Q "+count+":<span style='margin-left:10px'>"+value['ques']+"</span></div>"+
          "<p><input name='"+count+"' type='radio' id='"+count+"a' value='o1' /><label for='"+count+"a'>"+value['o1']+"</label></p>"+
          "<p><input name='"+count+"' type='radio' id='"+count+"b' value='o2'/><label for='"+count+"b'>"+value['o2']+"</label></p>"+
          "<p><input name='"+count+"' type='radio' id='"+count+"c' value='o3'/><label for='"+count+"c'>"+value['o3']+"</label></p>"+
          "<p><input name='"+count+"' type='radio' id='"+count+"d' value='o4'/><label for='"+count+"d'>"+value['o4']+"</label></p>"+
          "<div class=''>Answer :"+value['ans']+"</div><div class='divider'></div></td></tr>"
        );

          count++;
         });

        },"json");


        });


    });
</script>
