<?php
require '_includes/utils.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    // We want to redirect the user to the dash page showing the add user form and append an error telling them that they missed something
    header('Location: dash.php?err=Missing%20Uername%20or%20Password');
}

$password = password_hash($password, PASSWORD_BCRYPT);

$user = Auth::create($username, $password);
if ($user != null)
{
    header('Location: gdInsert.php?nm='.$username);
} else
{
    header('Location: bdInsert.php?err=Database%20Error');
}