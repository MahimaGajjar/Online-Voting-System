  <?php
	require_once '../includes/init.php';
	if(isset($_POST['id']))
{       
		$id=$_POST['id'];
		echo $sql = ("SELECT * FROM club WHERE college_id = '$id'");
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
		$club_id=$_POST['club_id'];
		 
		$sql = "SELECT `student_id` FROM `club_membership` WHERE `club_id` = '$club_id'";
		$query = mysqli_query($con, $sql);
		$result = [];
		while($row=mysqli_fetch_assoc($query))
		{
			$result[]= $row;
		}
		if(!empty($result)){
			$sql = "SELECT * FROM `stud` WHERE `id` IN (";
			foreach ($result as $value) {
				$sql.= $value['student_id'].",";
			}
			$sql = rtrim($sql, ",");
			$sql .= ")";
			
		$query = mysqli_query($con, $sql);
		while($row=mysqli_fetch_assoc($query))
		{
			$id=$row['id'];
			$student=$row['name'];
			echo "<option value='$id'>$student</option>";
		}
		}
	
}
?>
