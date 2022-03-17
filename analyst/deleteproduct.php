<?php 
	include('../config.php');
	$modelID = $_REQUEST['modelID'];
	$delete = mysqli_query($mysqli, "DELETE FROM product where modelID = '$modelID'");
	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'keyinproduct.php';</script>";
	}
 ?>