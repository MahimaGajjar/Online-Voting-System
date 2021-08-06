<?php
require_once '../includes/init.php';
if(isset($_SESSION['email_id']))
{
	echo 'WelCome' .$_SESSION['email'].'</br>';
	echo <a href="logout.php?logout">Logout</a>
}
else
{
	header("location:index.php");
}

$query="select * from college ";
$result=mysqli_query($con,$query);
?>


 <!DOCTYPE html>
<html>
   <head>
      
     <title>Admin </title>
   </head>
   <?php require_once '../includes/head.php';?>
   <body class="bg-dark">
      <div class="container">
      	 <div class="row">
      		 <div class="col lg-6">
      			 <div class="card-body">
      			 	<form method="POST">
      				 <table class="table table-bordered" align="center" border="5px">
      					 <tr>
      						 <th>College Name</th>
      						 <th>Operations</th>
      					 </tr>
      					 <?php
      					 		while($row=mysqli_fetch_assoc($result))
      					 		{
      					 			$college_name= $row['name'];
      					 		}
      					 		
      					   ?>
      					 <tr> 
      					 	<td><?php echo $college_name ?></td>
      					 	<td><a href="delete_clg.php?Del=<?php echo $college_name ?>">Delete</a></td>
						</tr>
					
					
      					 
      				  </table></br></br></br>

      				   <table class="table table-bordered" border="5px" align="center">
      					 <tr>
      						 <th>Club Name</th>
      						 <th>Operations</th>
      					 </tr>
      					 <?php
      					 		while($row=mysqli_fetch_assoc($result))
      					 		{
      					 			$club_name= $row['name'];
      					 		}
      					 		
      					   ?>
      					 <tr> 
      					 	<td><?php echo $club_name ?></td>
      					 	<td><a href="delete_clg.php?Del=<?php echo $club_name ?>">Delete</a></td>
						</tr>
					
					
      					 
      				  </table>
      			 </div>
             </div>
          </div>      
     </div>
 </form>
</body>
</html>
