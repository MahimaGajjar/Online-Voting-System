  <?php
	require_once '../includes/init.php';
	if(isset($_POST['id']))
{       
		$id=$_POST['id'];
		$sql = ("SELECT * FROM club WHERE college_id = '$id'");
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
		 
		$sql = "SELECT `candidate_id`,count(*) as 'votes' FROM `votes`  WHERE `club_id` = '$club_id' group by `candidate_id`  Order by 'votes' DESC LIMIT 1";
		$query = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($query);
		$sql="SELECT * FROM `stud` WHERE `id`= '".$result['candidate_id']."'";
		$query = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($query);
		echo  $result['name'];
	
	}
	
	
?>
