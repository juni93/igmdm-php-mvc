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


    //to create new articles
    public function createArticle($data){
        //define images path
        $target_dir = "images/articles/";
        //create image name with random number
        $imageName = $data['article_image_name'];
        $target_file = $target_dir . basename($imageName);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
         // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            move_uploaded_file($_FILES['name_imag']['tmp_name'],$target_dir.$imageName);
        }

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
        $this->db->bind(':preimage_arti', $imageName, PDO::PARAM_STR);
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