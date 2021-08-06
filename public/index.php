<?php    
require_once '../includes/init.php';
?>

<!DOCTYPE html>
<html>
   <head>
	    
	   <title>Registration </title>
   </head>
   <body>
   		<div>
   			  <?php require_once '../includes/header.php';?> 

   			<?php
   		if(isset($_POST['submit']))
   		{
				if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pwd'])) 
   				{
   					echo 'Please Fill In The Blanks';
   				}
   				else
   				{

   					$name     =$_POST['name'];
   					$email    =$_POST['email'];
   					$password =$_POST['pwd'];
   					$cpassword=$_POST['cpwd'];

   					$query="INSERT INTO `stud`( `name`, `email`, `password`, `college_id`) VALUES ('$name', '$email', '$pwd')";
   					$result = mysqli_query($con,$query);  

   					if($result)
   					{
   						header("location :home.php");
   					}
   					else
   					{
   						echo "Something is Wrong with the Query";
   					}
   				}
   		}
   			
   		else
   		{
   			header("Location:index.php");
   		}
   				
   			?>
   		</div>
        <form method="POST">
           <div class="container">
        	 <div class="row">
        	 	<div class="col-sm-3">
        	 		
        		<h1> Registration</h1>
        		<p>Fill Up The Form With Correct Values.</p>

        		<hr class="mb-3">
        		<lable for="firstname"><b>FirstName</b></lable>
        		<input class="form-control" type="text" name="name" required>
        
        		<lable for="email"><b>Email Address</b></lable>
        		<input class="form-control" type="email" name="email" required>
        
        		<lable for="password"><b>Password</b></lable>
        		<input class="form-control" type="password" name="pwd" required>
        
        		<lable for="cpassword"><b>Confirm Password</b></lable>
        		<input class="form-control" type="password" name="cpwd" required>

        		<div class="dropdown">
  				<button class="btn btn-info dropdown-toggle" type="button" id="college" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="college_id">
   				 Select College
  				</button>
  				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  				 <?php foreach($colleges as $college){?>	
    			<a value="<?php echo $college['id'] ?>" class="dropdown-item" href="#"><?php echo $college['name'] ?></a>
    		    <?php } ?>
    			</div>
				</div>
				<hr class="mb-3">
        		<input class="btn btn-primary" type="submit" name="submit">
        		<p>Already Have an account?<a href="login.php">Sign In</a></p>
        	</div>
        	</div>
          </div>
        </form>
   </body>
</html>
<?php require_once '../includes/footer.php';?> 