<?php
require_once '../includes/init.php';
?>
<!DOCTYPE html>
<html>
<htad>
	<title></title>
</htad>
<body class="bg-light">
      
      <div>
        <?php require_once '../includes/head.php';?>
      </div>
      
	<div class="container">
       <div class="row">
             <div class="col-lg-6-m-auto">
               <div class="col-mt-5">
                 <div class="card-title">
                    <h3 class="bg-primary text-white text-center py-3">Select Candidates </h3>
                 </div>     
                  <div class="card-body">
				     <form role="form" mehod="POST">
					   <select id="college" name="college_id">
      <option value="">Select College</option>
      <?php foreach($colleges as $college){?>
        <option value="<?php echo $college['id'] ?>"><?php echo $college['name'] ?></option>
      <?php } ?>
    </select>
    <select id="club" name="club_id">
      <option value=''>Select Club</option>
    </select>
    <select id="student" name="student_id">
      <option value=''>Select Student</option>
    </select>
    <button name="submit" value="submit"> Submit</button>
  </form>
  <?php require_once '../includes/footer.php'; ?>
    <script type="text/javascript">
      $("#college").change(function (){
        var college_id = $(this).val();
        console.log(college_id);
         $.post("",<...................................................................
         {college_id: college_id},
         function(data){
          var result = jQuery.parseJSON(data);

          $("#student").html("<option value=''>Select Student</option>");
          $("#club").html("<option value=''>Select Club</option>");
          $.each(result['clubs'], function(index, value){
            var html = "<option value='"+value['id']+"'>"+value['club_name']+"</option>";
            $("#club").append(html);
            console.log(html);
          })

          $.each(result['students'], function(index, value){
            var html = "<option value='"+value['id']+"'>"+value['student_name']+"</option>";
            $("#student").append(html);
            console.log(html);
          })
          
         });
      });
</script> 


		</div>
	</div>
</div>
</div>
</div>
</body>
</html>