<?php
include "login_check.php";
$remarks = isset($_GET['remark_login']) ? $_GET['remark_login'] : '';
if ( $remarks == "null") {
	echo '<div id="reg-head-fail" style="color:red" class="headrg">Login Failed! Please fill in</div>';
}
else if ($remarks == 'failed') {
	echo '<div id="reg-head-fail" style="color:red" class="headrg">Login Failed! Invalid Credentials</div>';
}
session_destroy();
