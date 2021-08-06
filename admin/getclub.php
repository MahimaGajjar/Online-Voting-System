<?php
require_once '../includes/init.php';
$db_handle = new DBController();
if(! empty($_POST['college_id'])){
	$query = "SELECT * FROM club WHERE college_id = '".$_POST["college_id"]."'";
	$result = mysqli_query($this->con,$query);
	while($row=mysqli_fetch_assoc($result)){
		$resultset[] = $row;
	}
	if(!empty($resultset))
	?>
	<option value disabled selected>Select Clubs</option>
		<?php
		foreach ($result as $club) {
			?>
			<option value="<?php echo $club["id"];?>"><?php echo $club["name"]; ?> </option>
			<?php

		}
}



?>