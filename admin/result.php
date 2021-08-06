 <?php
require_once '../includes/init.php';
if(!isset($_SESSION['id']))
{
  header('Location:index.php');
}
if(isset($_POST['club']) && (isset($_POST['student'])))
 {       
  $student_id=$_POST['student'];
  $club_id=$_POST['club'];
  echo $sql = "INSERT INTO `candidates`(`club_id`, `student_id`) VALUES ('$club_id','$student_id')";
  $query = mysqli_query($con, $sql);
 }
 
 $sql = "SELECT * FROM `college`";
              $query_ = mysqli_query($con,$sql);
              $colleges = [];
              while($row=mysqli_fetch_assoc($query_))
                    {
                      $colleges[]= $row;
                    }
                  
             
?>
<!DOCTYPE html>
<html>
<head>
  <title>Select Candidate</title>
</head>
<?php require_once '../includes/head.php';?>
<?php require_once '../includes/nav_admin.php';?>
<body class="bg-light">
      
      <main id="main">

   
    <section class="breadcrumbs">
      <div class="container">

      
         <form method="POST">
        <div class="card-title">
               <h3 class="bg-primary text-white text-center py-3">Select Candidates </h3>
           </div>     
           <div class="form-group">
          <lable for="College">Select College :</lable>
             <select class="form-control" id="college">
            <option selected="" disabled="">Select College</option>
            <?php
            foreach($colleges as $college){
            ?>
            <option value="<?php echo $college['id'] ?>"><?php echo $college['name'] ?></option>
            <?php
          }
          ?>
          </select>
        </div>
         <div class="form-group">
          <lable for="Club">Select Club :</lable>
             <select class="form-control" id="club" name="club">
                       <option value=''>Select Club</option>
                      </select>
                    </div>
                    
                     
                     <div class="form-group">
          <lable for="candidate">Winning Candidate:</lable><lable id="result"></lable>
             </div>
                    
              <br>
                     <input class="btn btn-primary" type="submit" name="submit">
            </form>
        </div>
    
</div>
</div>
</section>
     

 <script type="text/javascript"> 

$(document).ready(function(){
  $("#college").on('change',function(){
    var college_id=$(this).val();
    $.ajax({
      method: "POST",
      url: "getclubandstud.php",
      data:{id:college_id},
      dataType:"html",
      success:function(data){
        $("#club").html(data);
      }
    }); 
  });
   $("#club").on('change',function(){
    var club_id=$(this).val();

    $.ajax({
      method: "POST",
      url: "getvote.php",
      data:{club_id:club_id},
      dataType:"html",
      success:function(data){
        console.log(data);
        $("#result").html(data);
      }
    }); 
  });

});
</script> 


</script>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>
<?php require_once '../includes/footer.php';?> 
 