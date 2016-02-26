<?php

class User
{
    
    public $id;
    public $username;
    
    public function __construct($id, $username = '')
    {
        $this->id = $id;
        
        if ($username === '')
        {
            $db = DB::$instance->db;
            $stmnt = $db->prepare("SELECT `uname` FROM `users` WHERE `uid`=:id LIMIT 1");
            $stmnt->execute([":id" => $id]);
            
            if ($stmnt->rowCount() === 0)
            {
                throw new Exception("Invalid User ID");
            }
            
            $username = $stmnt->fetch()['uname'];
        }
        
        $this->username = $username;
    }
    
    public function update($key, $value)
    {
        // Update user in database here
    }
    
    public function purge()
    {
        // Delete user from database here
    }
    
}