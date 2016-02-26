<?php

// utils.php includes all classes that you need.
require '_includes/utils.php';
$uname = $_POST['un']; // wasn't this username? <-----
$pword = $_POST['pw']; // wasn't this password? <----- yeah

// Auth deals with authentication
if (Auth::attempt($uname, $pword) != null)
{
	// Auth::attempt() sets sessions
	// How do I get the username to display in the title and the backroom dash?
	// Auth::user()->username
	header('Location: success.php');
} else
{
	header('Location: index.php');
}