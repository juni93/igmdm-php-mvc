<?php

class Api{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    //get API data by making APICALL
    public function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); //per passare SSL
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //per passare SSL
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
    }


    //save API data in DB
    public function saveApiData($data){
       
        $sql = ("INSERT INTO tournaments (
            tid_tournament, 
            url_tournament, 
            format_tournament, 
            date_tournament, 
            name_tournament, 
            win_deck_tournament,
            win_did_tournament)
        VALUES(
            :tid_tournament, 
            :url_tournament, 
            :format_tournament, 
            :date_tournament, 
            :name_tournament, 
            :win_deck_tournament, 
            :win_did_tournament)"
        );

        //Insert query
        $this->db->query($sql);
     
        //bind values from form
        $this->db->bind(':tid_tournament', $data['tid'], PDO::PARAM_INT);
        $this->db->bind(':url_tournament', $data['url'], PDO::PARAM_STR);
        $this->db->bind(':format_tournament', $data['format'], PDO::PARAM_STR);
        $this->db->bind(':date_tournament', $data['date'], PDO::PARAM_STR);
        $this->db->bind(':name_tournament', $data['name'], PDO::PARAM_STR);
        $this->db->bind(':win_deck_tournament', $data['win_deck'], PDO::PARAM_STR);
        $this->db->bind(':win_did_tournament', $data['win_deck_id'], PDO::PARAM_INT);

        //execute the query
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    //get data from DB
    public function getTournamentDetails(){
        $sql = "SELECT * 
        FROM tournaments
        order by format_tournament DESC, tstamp DESC;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get standard tournaments from DB
    public function getStandardData(){
        $sql = "select * from tournaments
        where format_tournament = 'standard'
        order by tstamp DESC 
        limit 10;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get pioneer tournaments from DB
    public function getPioneerData(){
        $sql = "select * from tournaments
        where format_tournament = 'pioneer'
        order by tstamp DESC 
        limit 5;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get modern tournaments from DB
    public function getModernData(){
        $sql = "select * from tournaments
        where format_tournament = 'modern'
        order by tstamp DESC 
        limit 5;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get pauper tournaments from DB
    public function getPauperData(){
        $sql = "select * from tournaments
        where format_tournament = 'pauper'
        order by tstamp DESC 
        limit 5;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }

    //get legacy tournaments from DB
    public function getLegacyData(){
        $sql = "select * from tournaments
        where format_tournament = 'legacy'
        order by tstamp DESC 
        limit 5;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }
  
    

}