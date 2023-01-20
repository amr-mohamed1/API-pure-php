<?php 

require_once "api/reg.php";

$url = explode("/",$_SERVER["QUERY_STRING"]);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers:Origin, X-Requested-With, Content-Type, Accept");


if($url[1] == "v1"){


    //====================================
    //========== donate_places ===========
    //====================================

    if($url[2] == "event_attendee"){
        $regis = new reg();
        
        //all data
        if($url[4] == "check_member"){
                header("Acess-Control-Allow-Methods:GET");
                $data = file_get_contents("php://input");
                $returned_data = $regis->all_attendee();
                $result = [
                    'status' => 200,
                    'data' => $returned_data,
                ];
                echo json_encode($result);

        }

    }
    else{
        header("Location:index.php");
    }

}  else{
    header("Location:index.php");
}