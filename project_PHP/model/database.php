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
   
    //hiển thị tất cả sp

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
    //hiển thị theo ID
    function view($sql){
        $arr = array();
        $query = mysqli_query($this->conn, $sql);
    
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $arr[] = $row;
            }
        }
    
        return $arr;
    }



    public function searchData($searchVal){
  
  
      try {
       
           $dbConnection = $this->dbConnect();
           $stmt = $dbConnection->prepare("SELECT * FROM `product` WHERE `prod_name` like :searchVal");
           $val = "%$searchVal%"; 
           $stmt->bindParam(':searchVal', $val , PDO::PARAM_STR);   
           $stmt->execute();

           $Count = $stmt->rowCount(); 
           //echo " Total Records Count : $Count .<br>" ;
                     
           $result ="" ;
           if ($Count  > 0){
            while($data=$stmt->fetch(PDO::FETCH_ASSOC)) {          
               $result = $result .'<div class="search-result"><a style="text-decoration:none;" href="'.$data['prod_name'].'">'.$data['price'].'</a> </div>';    

            }
            return $result ;
           }

          }
          catch (PDOException $e) {
           echo 'Connection failed: ' . $e->getMessage();
          }
      }   
 
   
}


?>