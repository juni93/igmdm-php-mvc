<?php

class Articles{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }


    //Get all approved articles
    public function getAllArticles(){
        $sql = "SELECT * from arti 
        inner join frmt on id_frmt=frmt_arti
        inner join users on id_user = user_arti
        where pubb_arti= :pub_status order by date_arti DESC";

        $this->db->query($sql);

        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get 6 recent Articles for preview in HomePage
    public function getHpArticles(){
        $sql = "SELECT * from arti 
        inner join frmt on id_frmt=frmt_arti
        inner join users on id_user = user_arti
        where pubb_arti= :pub_status order by date_arti DESC LIMIT 12;";

        $this->db->query($sql);

        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //Get articles by formats
    public function getArticlesByFormat($format_id){
        $sql = "SELECT * from arti 
        inner join frmt on id_frmt=frmt_arti
        inner join users on id_user = user_arti
        where pubb_arti= :pub_status and frmt_arti=:format_id order by date_arti DESC;";

        $this->db->query($sql);

        $this->db->bind(':format_id', $format_id, PDO::PARAM_INT);
        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

      //Get articles by User
      public function getArticlesByUser($user_id){
        $sql = "SELECT * from arti 
        inner join frmt on id_frmt=frmt_arti
        inner join users on id_user = user_arti
        where pubb_arti= :pub_status and user_arti=:selected_user order by date_arti DESC;";

        $this->db->query($sql);

        $this->db->bind(':selected_user', $user_id, PDO::PARAM_INT);
        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        $this->db->execute();


        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get Articles to be approved
    public function getArticlesToBeApproved(){
        $sql = "SELECT * from arti 
        inner join frmt on id_frmt=frmt_arti
        inner join users on id_user = user_arti
        where pubb_arti= :pub_status order by date_arti DESC;";

        $this->db->query($sql);

        $this->db->bind(':pub_status', 0, PDO::PARAM_INT);

        $this->db->execute();

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }


    //get single article by ID
    public function getArticlebyId($article_id){
        $sql = "SELECT * from arti 
                inner join frmt on id_frmt=frmt_arti
                inner join users on id_user = user_arti
                where id_arti= '$article_id' ;";
                /* var_dump($sql);
                die; */
        $this->db->query($sql);
        
        //$this->db->bind(':article_id', $article_id, PDO::PARAM_INT);
        
        //Assign Row
        $row = $this->db->single();

        return $row;
    }

/*     public function imageResizeToThumb($imageSrc,$imageWidth,$imageHeight) {

        $newImageWidth =200;
        $newImageHeight =200;
    
        $newImageLayer=imagecreatetruecolor($newImageWidth,$newImageHeight);
        imagecopyresampled($newImageLayer,$imageSrc,0,0,0,0,$newImageWidth,$newImageHeight,$imageWidth,$imageHeight);
    
        return $newImageLayer;
    }

    public function compressImage($source, $destination, $quality) { 
        // Get image info 
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime']; 
        // Create a new image from file 
        switch($mime){ 
            case 'image/jpeg': 
                $image = imagecreatefromjpeg($source);
                break; 
            case 'image/png': 
                $image = imagecreatefrompng($source);
                break; 
            case 'image/gif': 
                $image = imagecreatefromgif($source);
                break; 
            default: 
                $image = imagecreatefromjpeg($source);
        } 
        // Save image 
        imagejpeg($image, $destination, $quality); 
         
        // Return compressed image 
        return $destination; 
    }

    

    /**
    *
    * Author: CodexWorld
    * Function Name: cwUpload()
    * $field_name => Input file field name.
    * $target_folder => Folder path where the image will be uploaded.
    * $file_name => Custom thumbnail image name. Leave blank for default image name.
    * $thumb => TRUE for create thumbnail. FALSE for only upload image.
    * $thumb_folder => Folder path where the thumbnail will be stored.
    * $thumb_width => Thumbnail width.
    * $thumb_height => Thumbnail height.
    *
    **/
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

    //to create new articles
    public function createArticle($data){        
        $imageName = $data['article_image_name'];

        $imageDir = "images/articles/";
        $thumbnailDir = "images/articles/thumbnails/";
        
        $upload_img = $this->cwUpload('name_imag', $imageDir, '', TRUE, $thumbnailDir, '120', '120');
        /************replace [mtgcard]card[/mtgcard] with deckbox.org tooltips***********/
        $content = $data['article_description'];
        $cardsParsed = preg_replace('/\[mtgcard\](.*?)\[\/mtgcard\]/', '<a href="https://deckbox.org/mtg/$1">$1</a>', $content);
        /************FINISH***********/

        /************parse article and replace decklist tags and decklist with hyperlink cards***********/
        //remove whitespace
        $withDecklist = trim($cardsParsed);

        //get text only between decklist tags
        $onlyDecklist = $this->get_string_between($withDecklist, '[decklist]', '[/decklist]');

        //strip html tags
        $stripped = strip_tags($onlyDecklist);

        //declare variable to push in data in foreach
        $linked = "";

        //explode by 1st delimiter to separate each card and it's quantity
        $firstExplode = explode(':', $stripped);

        //loop through each card and it's quantity to put links
        foreach($firstExplode as $single){
            //explode by second delimiter to get quantity and name of each card
            $e = explode('x ', $single);
            if(isset($e[1])){
                $linked .= $e[0]." <a href='https://deckbox.org/mtg/$e[1]'>".$e[1]."</a><br>";
            }
        }

        //replace old decklist tag content with new generated
        $parsedArticle = str_replace($onlyDecklist, $linked, $cardsParsed);

        $parsedArticle = preg_replace('/\[decklist\]/', " ", $parsedArticle);
        $parsedArticle = preg_replace('/\[\/decklist\]/', " ", $parsedArticle);
        

        $article_date = date("Y/m/d");
        $speakingTitle = str_replace(' ', '-', $data['article_title']);
        $sql = ("INSERT INTO arti (name_arti, url_arti, desc_arti, date_arti, frmt_arti, preimage_arti, user_arti)
        VALUES(:name_arti, :url_arti, :desc_arti, :date_arti, :frmt_arti, :preimage_arti, :user_arti)");
        //Insert query
        $this->db->query($sql);

        //bind values from form
        $this->db->bind(':name_arti', $data['article_title'], PDO::PARAM_STR);
        $this->db->bind(':url_arti', $speakingTitle, PDO::PARAM_STR);
        $this->db->bind(':desc_arti', $parsedArticle, PDO::PARAM_STR);
        $this->db->bind(':date_arti', $article_date, PDO::PARAM_STR);
        $this->db->bind(':frmt_arti', $data['artcile_format_id'], PDO::PARAM_INT);
        $this->db->bind(':preimage_arti', $upload_img, PDO::PARAM_STR);
        $this->db->bind(':user_arti', $_SESSION['id_user'], PDO::PARAM_STR);


        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    //publish selected article
    public function publishArticle($id){
        $sql = "UPDATE arti SET pubb_arti = :pub_status where id_arti = :id_arti";

        //insert query
        $this->db->query($sql);

        //bind values
        $this->db->bind(':id_arti', $id, PDO::PARAM_INT);
        $this->db->bind(':pub_status', 1, PDO::PARAM_INT);

        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //update articles
    public function updateArticle($id, $data){
        //replace [mtgcard]card[/mtgcard] with deckbox.org tooltips
        $content = $data['article_description'];
        $cardsParsed = preg_replace('/\[mtgcard\](.*?)\[\/mtgcard\]/', '<a href="https://deckbox.org/mtg/$1">$1</a>', $content);

        /************parse article and replace decklist tags and decklist with hyperlink cards***********/
        //remove whitespace
        $withDecklist = trim($cardsParsed);

        //get text only between decklist tags
        $onlyDecklist = $this->get_string_between($withDecklist, '[decklist]', '[/decklist]');

        //strip html tags
        $stripped = strip_tags($onlyDecklist);

        //declare variable to push in data in foreach
        $linked = "";

        //explode by 1st delimiter to separate each card and it's quantity
        $firstExplode = explode(':', $stripped);

        //loop through each card and it's quantity to put links
        foreach($firstExplode as $single){
            //explode by second delimiter to get quantity and name of each card
            $e = explode('x ', $single);
            if(isset($e[1])){
                $linked .= $e[0]." <a href='https://deckbox.org/mtg/$e[1]'>".$e[1]."</a><br>";
            }
        }

        //replace old decklist tag content with new generated
        $parsedArticle = str_replace($onlyDecklist, $linked, $cardsParsed);

        $parsedArticle = preg_replace('/\[decklist\]/', " ", $parsedArticle);
        $parsedArticle = preg_replace('/\[\/decklist\]/', " ", $parsedArticle);

        $article_date = date("Y/m/d");
        $sql = ("UPDATE arti 
            SET
            name_arti = :name_arti,
            desc_arti = :desc_arti,
            date_arti = :date_arti,
            frmt_arti = :frmt_arti
            WHERE id_arti = $id");
        //Insert query
        $this->db->query($sql);

        //bind values from form
        $this->db->bind(':name_arti', $data['article_title'], PDO::PARAM_STR);
        $this->db->bind(':desc_arti', $parsedArticle, PDO::PARAM_STR);
        $this->db->bind(':date_arti', $article_date, PDO::PARAM_STR);
        $this->db->bind(':frmt_arti', $data['artcile_format_id'], PDO::PARAM_INT);


        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}