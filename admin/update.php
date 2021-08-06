<?php
require_once '../includes/init.php';

if(isset($_GET['Upd']))
{
	$College_ID=$_GET['Upd'];
	$query="  UPDATE `stud` SET `status`='1' WHERE `id` ='".$student['status']."'";
	$result=mysqli_query($con,$query);

	if($result)
	{
		header("location:home.php");
	}
	else
	{
		echo "Please Check Your Query";
	}
}


?>