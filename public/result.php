<?php 
require_once '../includes/init.php';
if(!isset($_SESSION['id'])){
  header('Location:login.php');
}
 
 $sql = "SELECT * FROM `club_membership` where `student_id`='".$_SESSION['id']."'";
              $query_ = mysqli_query($con,$sql);
              $clubs = [];
              while($row=mysqli_fetch_assoc($query_))
                    {
                      $sql ="SELECT * FROM `club` WHERE `id` =".$row['club_id']."";
                      $query = mysqli_query($con,$sql);
                      $result = mysqli_fetch_assoc($query);
                      $row['name'] = $result['name'];
                      $clubs[]= $row;

                    }
                  
             
?>
<!DOCTYPE html>
<html>
<head>
  <title>Select Candidate</title>
</head>
<?php require_once '../includes/head.php';?>
<?php require_once '../includes/nav_user.php';?>
<body class="bg-light">
      
      <main id="main">

   
    <section class="breadcrumbs">
      <div class="container">

      
         <form method="POST">
        <div class="card-title">
               <h3 class="bg-primary text-white text-center py-3">  Result </h3>
           </div>     
           <div class="form-group">
          <lable for="College">Select Club :</lable>
             <select class="form-control" id="club">
            <option selected="" disabled="">Select Club</option>
            <?php
            foreach($clubs as $club){
            ?>
            <option value="<?php echo $club['club_id'] ?>"><?php echo $club['name'] ?></option>
            <?php
          }
          ?>
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
  $("#club").on('change',function(){
    var club_id=$(this).val();

    $.ajax({
      method: "POST",
      url: "getvote.php",
      data:{id:club_id},
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