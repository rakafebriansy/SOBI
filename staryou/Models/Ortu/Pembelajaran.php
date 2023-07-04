<?php

require_once 'Helpers/db_con.php';
class pembelajaran {

    private $db;

    public function __construct() 
    {
        $this->db = new db();
    }

    public function listPembelajaran()
    {
        $query = "select * from pembelajaran p order by p.id_pembelajaran asc;";
        $this->db->query($query);
        $array_hasil = $this->db->fetchAll();
        return $array_hasil;

    }

}


?>