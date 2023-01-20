<?php

class reg {
        public $con;

        public function __construct()
        {
            // make a connection to mysql here
            $dsn = "mysql:host=localhost;dbname=ieee";
            $user = "root";
            $pass="";
            
            try{
                $this->con = new PDO($dsn , $user , $pass);
            
            }catch(PDOException $e){
                echo "error" . $e->getMessage();
            }
        }

        /*===================== all attendee =========================*/
        public function all_attendee(){
            $stmt =  $this->con->prepare("SELECT * FROM mega_event");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $url = explode("/",$_SERVER["QUERY_STRING"]);
            if($url[3] == "flutter-2022"){
                return $rows;
            }else{
                return "error :- please contact your provideer";
            }
        }
}
