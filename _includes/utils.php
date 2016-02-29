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

function populate($asTable)
{
	$query = DB::$instance->query_books();
	if ($asTable)
	{
		foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $r)
		{
			include 'table_temp.php';
		}
	} else
	{
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
}

function populate_options($col)
{
	if ($col != 'title')
	{
		$query = DB::$instance->get_current($col);
	} else
	{
	}
	
	foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $r)
	{
		echo '<option value="' . htmlentities($r[$col.'_id']) . '">' . ucwords(htmlentities($r[$col])) . '</option>';
	}
}

function update_field($what, $value)
{
    $query = DB::$instance->get_current($what);
    $ret = "";
    
    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $r)
    {
        if ($r[$what] == $value)
        {
        	$ret = $r[$what.'_id'];
            break;
        } else
        {
            $id = DB::$instance->add($what, $value);
            $ret = $id;
        }
    }
    return $ret;
}

?>