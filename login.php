<?php
require 'db.php';
$uname = $_POST['un'];
$pword = $_POST['pw'];
$db = new DB();
if ($db->check_user($uname, $pword)) {
	header('Location: sucess.php');
	session_start();
} else {
	header('Location: index.php');
}
$_SESSION['un'] = $uname;