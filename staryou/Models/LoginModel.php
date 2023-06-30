
<?php

require_once 'Helpers/db_con.php';

class LoginModel {

    private $db;

    public function __construct() 
    {
        $this->db = new db();
    }

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
    
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function Login($NamaUser, $Passwd)
    {
        $query = "call Login('{$NamaUser}', '{$Passwd}')";
        // echo 'query: '.$query;
        $this->db->query($query);
        $array_hasil = $this->db->fetchAll();
        return $array_hasil;
    }

    public function Register($nama, $email, $idPeran, $Passwd)
    {
        $myuuid = $this->guidv4();
        $query = "call register('{$myuuid}', '{$nama}',  '{$email}', {$idPeran}, '{$Passwd}')";
         echo 'query: '.$query;
        $this->db->query($query);
        $array_hasil = $this->db->fetchAll();
        return $array_hasil;
    }


}


?>