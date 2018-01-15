<div class="card-panel Cyan col l12 s12 m12">
  <div style="display:flex; justify-content:center; color:White; font-weight:bold; font-size:20px;">ADD SCHOOL</div>
</div>
<form class="col l6 offset-l3 z-depth-4 white">
  <div class="input-field col s12">
    <input id="sn" type="text">
    <label for="sn">School Name</label>
  </div>
  <div class="input-field col s12">
    <input id="adr" type="text">
    <label for="adr">Address</label>
  </div>
  <div class="input-field col s12">
    <input id="town" type="text">
    <label for="town">Town</label>
  </div>
  <div class="input-field col s12">
    <input id="phn" type="text">
    <label for="phn">Phone No</label>
  </div>
  <div class="input-field col s12">
    <input id="eml" type="text">
    <label for="eml">Email</label>
  </div>
  <div class="input-field col s12">
    <input id="pri" type="text">
    <label for="pri">Principle</label>
  </div>

</form>
<div class="col l12 s12 m12 offset-l3">
  <a id="add_s" class="btn" href="#">ADD</a>
</div>

<script type="text/javascript">
$(document).ready(function(){

    $('#add_s').click(function(){
      // $("#o1").empty();

      var pri =$("#pri").val();
      var phn =$("#phn").val();
      var eml =$("#eml").val();
      var  sn=$("#sn").val();
      var adr =$("#adr").val();
      var t=$("#town").val();

      if(eml!=""&&sn!=""&&phn!=""&&pri!=""&&adr!=""&&t!=""){
        //----------Email validate
          if(validateEmail(eml))
          {
            //-------Post to Php file Func_add_schl.php----------
            $.post("func_add_schl.php",{
                sn:sn,
                eml:eml,
                phn:phn,
                pri:pri,
                t:t,
                adr:adr
              },function(data){
                console.log(data);
                if(data=="success")
                {
                  Materialize.toast('SCHOOL ADDED', 1500);
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
