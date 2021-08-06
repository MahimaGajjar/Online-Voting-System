  <?php
	require_once '../includes/init.php';
	if(isset($_POST['id']))
{       
		$id=$_POST['id'];
		echo $sql = ("SELECT * FROM stud WHERE college_id = '$id'");
		$query = mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($query))
		{
			$id=$row['id'];
			$club=$row['name'];
			echo "<option value='$id'>$club</option>";
		}
}


	if(isset($_POST['club_id']))
{       
		$id=$_POST['club_id'];
		 $sql = ("SELECT * FROM stud WHERE club_id = '$id'");
		 
		 //SELECT * FROM `club_membership` WHERE club_id = '$id'"
		 //SELECT `id`, `name` FROM `stud`
		 //ECHO the student name 
		$query = mysqli_query($con,$sql);
		while($row=mysqli_fetch_assoc($query))
		{
			$id=$row['id'];
			$stud=$row['stud'];
			echo "<option value='$id'>$stud</option>";
		}
}
?>
