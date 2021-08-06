  <?php
	require_once '../includes/init.php';
	
	if(isset($_POST['id']))
{       
		$club_id=$_POST['id'];
		 
		$sql = "SELECT `candidate_id`,count(*) as 'votes' FROM `votes`  WHERE `club_id` = '$club_id' group by `candidate_id`  Order by 'votes' DESC LIMIT 1";
		$query = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($query);
		$sql="SELECT * FROM `stud` WHERE `id`= '".$result['candidate_id']."'";
		$query = mysqli_query($con, $sql);
		$result = mysqli_fetch_assoc($query);
		echo  $result['name'];
	
	}
?>
