<?php

class Decks{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = ''){

        //folder path setup
        $target_path = $target_folder;
        $thumb_path = $thumb_folder;
        
        //file name setup
        $filename_err = explode(".",$_FILES[$field_name]['name']);
        $filename_err_count = count($filename_err);
        $file_ext = $filename_err[$filename_err_count-1];
        if($file_name != ''){
            $fileName = $file_name.'.'.$file_ext;
        }else{
            $fileName = $_FILES[$field_name]['name'];
        }
        
        //upload image path
        $upload_image = $target_path.basename($fileName);
        
        //upload image
        if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
        {
            //thumbnail creation
            if($thumb == TRUE)
            {
                $thumbnail = $thumb_path.$fileName;
                list($width,$height) = getimagesize($upload_image);
                $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
                switch($file_ext){
                    case 'jpg':
                        $source = imagecreatefromjpeg($upload_image);
                        break;
                    case 'jpeg':
                        $source = imagecreatefromjpeg($upload_image);
                        break;

                    case 'png':
                        $source = imagecreatefrompng($upload_image);
                        break;
                    case 'gif':
                        $source = imagecreatefromgif($upload_image);
                        break;
                    default:
                        $source = imagecreatefromjpeg($upload_image);
                }

                imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
                switch($file_ext){
                    case 'jpg' || 'jpeg':
                        imagejpeg($thumb_create,$thumbnail,90);
                        imagejpeg($source, $upload_image, 50);
                        break;
                    case 'png':
                        imagepng($thumb_create,$thumbnail,90);
                        imagepng($source, $upload_image, 50);
                        break;

                    case 'gif':
                        imagegif($thumb_create,$thumbnail,90);
                        imagegif($source, $upload_image, 50);
                        break;
                    default:
                        imagejpeg($thumb_create,$thumbnail,90);
                        imagejpeg($source, $upload_image, 50);
                }

            }

            return $fileName;
        }
        else
        {
            return false;
        }
    }

    public function createDecklist($data){
        $imageName = $data['decklist_image_name'];
        $imageDir = "images/decks/";
        $thumbnailDir = "images/decks/thumbnails/";
        $upload_img = $this->cwUpload('name_imag', $imageDir, '', TRUE, $thumbnailDir, '120', '120');
        
        /*****************************************************/
        /*********************LINK MTG CARDS******************/
        /*****************************************************/
        $main = $data['decklist_main'];
        $main = trim($main);
	    $main = preg_split('/\r\n|[\r\n]/', $main);
        $mainDeck = "";
		foreach ($main as $line){
			$carte = explode(" ", $line, 2);
			$mainDeck .= $carte[0]." <a href='https://deckbox.org/mtg/$carte[1]'>".$carte[1]."</a><br>";
        }

        $side = $data['decklist_side'];
        $side = trim($side);
	    $side = preg_split('/\r\n|[\r\n]/', $side);
        $sideDeck = "";
		foreach ($side as $line){
			$carte = explode(" ", $line, 2);
			$sideDeck .= $carte[0]." <a href='https://deckbox.org/mtg/$carte[1]'>".$carte[1]."</a><br>";
        }

        $decklist_date = date("Y/m/d");
        $speakingTitle = str_replace(' ', '-', $data['decklist_title']);
        $sql = ("INSERT INTO decks (name_decks, main_decks, side_decks, date_decks, frmt_decks, image_decks, user_decks, speakingtitle_decks)
        VALUES(:name_decks, :main_decks, :side_decks, :date_decks, :frmt_decks, :image_decks, :user_decks, :speakingtitle_decks)");
        //Insert query
        $this->db->query($sql);

        //bind values from form
        $this->db->bind(':name_decks', $data['decklist_title'], PDO::PARAM_STR);
        $this->db->bind(':main_decks', $mainDeck, PDO::PARAM_STR);
        $this->db->bind(':side_decks', $sideDeck, PDO::PARAM_STR);
        $this->db->bind(':date_decks', $decklist_date, PDO::PARAM_STR);
        $this->db->bind(':frmt_decks', $data['decklist_format_id'], PDO::PARAM_INT);
        $this->db->bind(':image_decks', $upload_img, PDO::PARAM_STR);
        $this->db->bind(':user_decks', $_SESSION['id_user'], PDO::PARAM_STR);
        $this->db->bind(':speakingtitle_decks', $speakingTitle, PDO::PARAM_STR);

        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Get all approved decklists
    public function getAllDecklists(){
        $sql = "SELECT * from decks 
        inner join frmt on id_frmt=frmt_decks
        inner join users on id_user = user_decks
        where pubb_decks= :pub_status order by date_decks DESC";

        $this->db->query($sql);

        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    
    //Get decklists by formats
    public function getDecklistsByFormat($format_id){
        $sql = "SELECT * from decks 
        inner join frmt on id_frmt=frmt_decks
        inner join users on id_user = user_decks
        where pubb_decks= :pub_status and frmt_decks=:format_id order by date_decks DESC;";

        $this->db->query($sql);

        $this->db->bind(':format_id', $format_id, PDO::PARAM_INT);
        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get decklists by User
    public function getDecklistsByUser($user_id){
        $sql = "SELECT * from decks 
        inner join frmt on id_frmt=frmt_decks
        inner join users on id_user = user_decks
        where pubb_decks= :pub_status and user_decks=:selected_user order by date_decks DESC;";

        $this->db->query($sql);

        $this->db->bind(':selected_user', $user_id, PDO::PARAM_INT);
        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();


        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get single decklist by ID
    public function getDecklistbyId($decklist_id){
        $sql = "SELECT * from decks 
                inner join frmt on id_frmt=frmt_decks
                inner join users on id_user = user_decks
                where id_decks= '$decklist_id' ;";
                /* var_dump($sql);
                die; */
        $this->db->query($sql);
        
        //$this->db->bind(':article_id', $article_id, PDO::PARAM_INT);
        
        //Assign Row
        $row = $this->db->single();

        return $row;
    }


}