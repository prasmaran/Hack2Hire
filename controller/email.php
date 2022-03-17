<?php
    	$python = shell_exec('C:\Python39\python.exe emailtesttharvin.py');
		echo "Python is printing:" . $python;
		header("location: analysis_report.php");
?>