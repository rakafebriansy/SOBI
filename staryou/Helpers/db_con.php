7<?php
class db {

//    protected $connection;
    public $connection;
	protected $query;
	public $query_count = 0;
        public $isSuccess;
        public $sqlQuery;
        protected $isDebug;
        ///$_SESSION['is_debug']


        public function __construct() 
        {
		
	    }

        public function test()
        {
            
        }

	    
	    public function getKoneksi()
	    {
			$isDebug = false;
			$servername = 'localhost';
			$username = 'root';
			$password = '';
			$database = 'staryou';
			
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            $this->isSuccess = true;
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                $this->isSuccess = false;
            }
            
            return $conn;
	    }
	    

        public function replSpCh($str_input)
        {
//            $newStr =  str_replace('\\','\\\\',$str_input);
            $newStr =  str_replace("'","\'",$str_input);
            $newStr =  str_replace('"','',$newStr);
            $newStr =  str_replace("%","\%",$newStr);
//            $newStr =  preg_replace('/[^A-Za-z0-9\-]/', '', $str_input);
            return $newStr;
        }

       public function query($query) {
        $this->sqlQuery = $query;
        return $this;
       }
       
       
    public function fetchAll() {
        
          $conn = $this->getKoneksi();
          
          $result  = mysqli_query($conn, $this->sqlQuery);
        $arr1 = array();
	    if($result != '1')
	    {
	        $this->isSuccess = true;
	    }
	    else{
	        $this->isSuccess = false;
	        
	        return $arr1;
	    }
    
        $this->query_count = 0;
            while ($row = mysqli_fetch_array($result))
            {  
        // print_r("tes");
                array_push($arr1,$row);
                $this->query_count = $this->query_count + 1;
            }
            
            $conn->close();
      
        //if(isset($_SESSION['is_debug']))
        //{
            if($this->isDebug)
            {
                echo '<div style="background-color: yellow; padding: 5px;">q: '.$this->sqlQuery.'</div>';
                echo '<div style="background-color: lightgreen; padding: 5px;">';
                print_r($arr1);
                echo '</div>';
               
            }
        //}
        return $arr1;
	}


    public function berhasil()
    {
        return $this->isSuccess;
    }
	
    public function execNonQuery() {
        
          $conn = $this->getKoneksi();
          
        if($this->isDebug)
        {
            echo '<div style="background-color: red; padding: 5px;">q: '.$this->sqlQuery.'</div>';
        }
        
	    if($conn->query($this->sqlQuery))
	    {
	        $this->isSuccess = true;
	    }
	    else{
	        $this->isSuccess = false;
	    }
	    
        $conn->close();
	}

	
	public function numRows() {
		return $this->query_count;
	}


}
?>
