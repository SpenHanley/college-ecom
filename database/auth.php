<?php

class Auth
{
    
    private static $user = null;
    
    public static function user()
    {
        return self::$user;
    }
    
    public static function check()
    {
        return self::$user != null;
    }
    
    public static function setUserUnsafe($user)
    {
        self::$user = $user;
    }
    
    public static function attempt($username, $password)
    {
        // Get the ID after successful attempt and set the variable's value.
        $id = 0;
        $usernameFromDatabase = "";
        
        $db = DB::$instance->db;
        
        // Order by uid LIMIT 1 -> make sure that we select the first user if there are multiple with one username for some reason.
        $stmnt = $db->prepare('SELECT * FROM users WHERE `uname`=:un ORDER BY `uid` ASC LIMIT 1');
        $stmnt->execute([":un" => $username]);
        $row = $stmnt->fetch();
        
        if (password_verify($password, $row['pword']))
        {
            $id = $row['uid'];
            $usernameFromDatabase = $row['uname'];
            
        }
        
        // Set this variable's value once they are successfully verified to login.
        
        if ($id === 0)
        {
            // Return null if the attempt failed. If you didn't modify the ID, then you must have
            // failed to get a valid user record from the database.
            return null;
        }
        
        // Make an instance of User.
        $user = new User($id, $usernameFromDatabase);
        
        // Set the logged in user to be the user instance.
        self::$user = $user;
        
        // Set sessions
        $_SESSION['user_id'] = $id;
        
        // Return an instance of User if the attempt succeeded.
        return $user;
    }
    
    public static function create($username, $password)
    {
        // Get the ID after creation and set this variable's value.
        $id = 0;
        
        // Get DB instance.
        $db = DB::$instance->db;
        
        // Check for existing user with the username.
        // Don't register someone with existing
        // username.
        $stmnt = $db->prepare('SELECT COUNT(*) as `count` FROM users WHERE `uname`=:un');
        $stmt->execute([':un' => $username]);
        
        if ($stmnt->fetch()['count'] > 0)
        {
            // User exists
        }
        
        if ($id === 0)
        {
            // Return null if the CREATE query failed. If the CREATE succeeded and it got here,
            // you forgot to assign $id.
            return null;
        }
        
        // User created. Let's pass it back to the place that wants it.
        return new User($id, $username);
    }
    
}