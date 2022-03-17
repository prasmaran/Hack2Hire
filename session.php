<?php
include('config.php');
session_start();
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($mysqli, "select acc_uname, acc_id, acc_fullname from access where acc_uname='$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$loggedin_session = $row['acc_uname'];
$loggedin_name = $row['acc_fullname'];
$loggedin_id = $row['acc_id'];


if (!isset($loggedin_session) || $loggedin_session == NULL) {
  echo "Go back";
  header("Location: login.php");
}
