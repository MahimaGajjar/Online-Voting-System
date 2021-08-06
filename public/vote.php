<?php
require_once '../includes/init.php';
$query="select * from club ";
$result=mysqli_query($con,$query);
?>


<!DOCTYPE html>
<html>
   <head>
     <link href="/css/bootstrafsddsffp.min.css" rel="stylesheet">
     <title>Select Clubs </title>
   </head>
   <?php require_once '../includes/head.php';?>
   <?php require_once '../includes/nav_user.php';?>

   <body class="bg-dark">
      
      <main id="main">

   
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
         <form method="POST">
        <div class="card-title">
               <h3 class="bg-primary text-white text-center py-3">Select Candidates </h3>
           </div>     
           <div class="card-body">
        <form role="form" mehod="POST">
             
                        <select id="club" name="club_id">
                              <option value=''>Select Club</option>
                      </select>
                      <select id="student" name="student_id">
                             <option value=''>Select Student</option>
                      </select>
              <br>
                      <button name="submit" value="submit"> Submit</button>
            </form>
        </div>
    
</div>
</div>
</section>

  <?php require_once '../includes/footer.php'; ?>
    
    <script type="text/javascript">
      $("#college").change(function (){
        var college_id = $(this).val();
        con           sole.log(college_id);
         $.post("",<...................................................................how to get college id?
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
<?php require_once '../includes/footer.php';?> 
