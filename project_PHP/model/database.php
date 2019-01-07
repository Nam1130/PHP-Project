<?php
class database{
    private $host = "localhost:3307";
    private $db_name = "db";
    private $username = "root";
    private $password = "";
    public $conn;
    private $results="";


    function __construct(){
        $this->conn =  mysqli_connect($this->host,$this->username, $this->password, $this->db_name);
        if($this->conn === false){
            echo("ERROR: kết nối thất bại " . mysqli_connect_error());
          
        }else{
          
            mysqli_set_charset($this->conn, 'UTF8');
           
        }
        return $this->conn;
    }

    //truy Vấn
    public function excute($sql){
        $this->results = $this->conn->query($sql);
        return $this->results;
    }
   
    //hiển thị sp

    public function display($table)
    {
       
       
        $sql = 'SELECT * FROM '. $table;
        $data = null;
        if($result = mysqli_query($this->conn,$sql)){
            while($row = mysqli_fetch_array($result)){
                $data[] = $row;
            }
            mysqli_free_result($result);
            return $data;
        }
        else
            $arr = 0;
        return  $arr;
    }

}


?>