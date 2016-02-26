<?php

session_start();

require_once 'database/user.php';
require_once 'database/auth.php';
require_once 'database/db.php';

DB::init();

// Set the logged in user if they are here
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0)
{
	Auth::setUserUnsafe(new User($_SESSION['user_id']));
}

function populate()
{
	$query = DB::$instance->query_books();
	
	foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $r)
	{
		include 'table_temp.php';
	}
}

function populate_options($col)
{
	$query = DB::$instance->get_current($col);
	
	foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $r)
	{
		echo '<option value="' . htmlentities($r[$col.'_id']) . '">' . ucwords(htmlentities($r[$col])) . '</option>';
	}
}