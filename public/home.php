
<?php   
require_once '../includes/init.php';

?>
 

<!DOCTYPE html>
<html lang="en">

<head>
  
  <?php require_once '../includes/header.php';?> 
    <title>Home</title>
   
</head>

<body style="background:#AFC9EC">
  <div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
      <div class="col-md-6 col-md-offset-3 align="center">

      <form method="POST">
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
         $.post("get_club_and_student.php",
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

  </body>
 </html>

<?php require_once '../includes/footer.php';?> 