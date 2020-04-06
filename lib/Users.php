<?php

class Users{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Get user info for login
    public function userLogin($data){
        $pass = $data['password'];
        $sql = "SELECT * FROM users WHERE nick_user = :nick_user";

        $this->db->query($sql);

        $this->db->bind(':nick_user', $data['username'], PDO::PARAM_STR);

        //Attempt to execute the prepared statement
        $row = $this->db->single();

        if($row){
            $hashed_pass = $row[0]->pass_user;
            if(password_verify($pass, $hashed_pass)){
                return $row;
            }
        }
        
    }

    //get logged in user details
    public function getActiveUser($userId){
        $sql = "SELECT * FROM users WHERE id_user = $userId";
        $this->db->query($sql);
        $row = $this->db->single();
        return $row;
    }

    //update user details
    public function updateProfile($data, $userId){
        //define images path
        $target_dir = "images/users/";
        //create image name with random number
        $imageName = $data['imag_user'];
        $target_file = $target_dir . basename($imageName);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
         // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            move_uploaded_file($_FILES['imag_user']['tmp_name'],$target_dir.$imageName);
        }

        $sql = ("UPDATE users 
            SET
            nick_user = :nick_user,
            name_user = :name_user,
            desc_user = :desc_user,
            imag_user = :imag_user
            WHERE id_user = $userId");
        //Insert query
        $this->db->query($sql);

        //bind values from form
        $this->db->bind(':nick_user', $data['nick_user'], PDO::PARAM_STR);
        $this->db->bind(':name_user', $data['name_user'], PDO::PARAM_STR);
        $this->db->bind(':desc_user', $data['desc_user'], PDO::PARAM_STR);
        $this->db->bind(':imag_user', $data['imag_user'], PDO::PARAM_STR);


        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    //vaidate nickname if exists
    public function userNameExits($nickToCheck){
        // Prepare a select statement
        $sql = "SELECT id_user FROM users WHERE nick_user = :nickToCheck";
        
        $this->db->query($sql);

        $this->db->bind(":nickToCheck", $nickToCheck, PDO::PARAM_STR);    
        // Attempt to execute the prepared statement
        $this->db->execute();

        $row = $this->db->single();
        if($row){
            return true;
        } else{
            return false;
        }

    }

    public function createNewUser($nickName, $pwd){

        $password = password_hash($pwd, PASSWORD_DEFAULT);
        $sql = ("INSERT INTO users (nick_user, pass_user)
        VALUES(:nick_user, :pass_user)");

        $this->db->query($sql);

        //bind values from form
        $this->db->bind(':nick_user', $nickName, PDO::PARAM_STR);
        $this->db->bind(':pass_user', $password, PDO::PARAM_STR);

        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }



}
