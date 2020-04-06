<?php

class Formats{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Get All Formats
    public function getAllFormats(){
        $sql = "SELECT id_frmt, name_frmt, desc_frmt from frmt;";

        $this->db->query($sql);

        //Assign Result Set
        $results = $this->db->resultSet();

        return $results;
    }
}