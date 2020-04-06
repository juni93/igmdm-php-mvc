<?php

class Events{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //to get all events
    public function getAllEvents(){
        
        $sql = "SELECT * from eventi INNER JOIN frmt ON id_frmt=format_event ORDER BY created_at DESC";
        
        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //to create new Events
    public function createEvent($data){
        //define images path
        $target_dir = "images/";
        //create image name with random number
        $imageName = $data['event-image'];
        $target_file = $target_dir . basename($imageName);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
         // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            move_uploaded_file($_FILES['event-image']['tmp_name'],$target_dir.$imageName);
        }
       
        $sql = ("INSERT INTO eventi (title_event, date_event, place_event, price_event, reduce_price_event, format_event,
        prize_event, description_event, image_event, start_time_event, fblink_event)
        VALUES(:title_event, :date_event, :place_event, :price_event, :reduce_price_event, :format_event, :prize_event, 
        :description_event, :image_event, :start_time_event, :fblink_event)");

        //Insert query
        $this->db->query($sql);
     
        //bind values from form
        $this->db->bind(':title_event', $data['event-title'], PDO::PARAM_STR);
        $this->db->bind(':date_event', $data['event-date'], PDO::PARAM_STR);
        $this->db->bind(':start_time_event', $data['event-time'], PDO::PARAM_STR);
        $this->db->bind(':place_event', $data['event-place'], PDO::PARAM_STR);
        $this->db->bind(':price_event', $data['event-price'], PDO::PARAM_STR);
        $this->db->bind(':reduce_price_event', $data['event-reduced-price'], PDO::PARAM_STR);
        $this->db->bind(':format_event', $data['event-format-id'], PDO::PARAM_INT);
        $this->db->bind(':fblink_event', $data['event-fblink'], PDO::PARAM_INT);
        $this->db->bind(':prize_event', $data['event-prize'], PDO::PARAM_STR);
        $this->db->bind(':description_event', $data['event-description'], PDO::PARAM_STR);
        $this->db->bind(':image_event', $imageName, PDO::PARAM_STR);

        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    

}