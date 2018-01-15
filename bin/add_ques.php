    <div class="row">
    <form class="white z-depth-4">
      <div class="card-panel cyan">
        <span class="white-text">ADD QUESTION</span>
      </div>
      <div class="row">
         <div class="input-field col s12">
             <textarea id="ques" name='qu_txt' class="materialize-textarea"></textarea>
             <label for=ques>Question</label>
         </div>
         <div class="input-field col s12">
               <input id="o1" type="text" name=o1 data-length="100">
              <label for="o1">Option-1</label>
          </div>
          <div class="input-field col s12">
               <input id="o2" type="text" name='o2' data-length="100">
              <label for="o2">Option-2</label>
          </div>
          <div class="input-field col s12">
               <input id="o3" type="text" name='o3' data-length="100">
              <label for="o3">Option-3</label>
          </div>
          <div class="input-field col s12">
               <input id="o4" type="text" name='o4' data-length="100">
              <label for="o4">Option-4</label>
          </div>
          <div class="input-field col s12">
               <input id="ans" type="text" name='answer' data-length="100">
              <label for="answer">ANSWER (o1,o2,o3,o4)</label>
          </div>
      </div>

    </form>
    <div class="col l3 s12 m6">
      <a id="add" class="btn" href="#"><span>ADD</span></a>
    </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){

        $('#add').click(function(){ //Function to be performed when logout is clicked
          // $("#o1").empty();
          var ques = $("#ques").val();
          var o1 =$("#o1").val();
          var o2 =$("#o2").val();
          var o3 =$("#o3").val();
          var o4 =$("#o4").val();
          var ans =$("#ans").val();
          $.post("func_addques.php",{
              ques:ques,
              o1:o1,
              o2:o2,
              o3:o3,
              o4:o4,
              ans:ans
              },function(data){
              console.log(data);
              if(data=="success")
              {
              
                Materialize.toast('Ques Added Successfully', 1500);

              }
              else
              {
                Materialize.toast('Someting Went Wrong', 1500);
              }
            });
        });



      });
    </script>
