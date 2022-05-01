<?php
namespace App\Utils;


class Helper {
   
    public static function createStdResponse($status=false, $message=null, $data=null, $error=null){
        return new StdResponse($status, $message, $data, $error);
    }

    public static function jsonResponse(StdResponse $response){
        header("Content-type: application/json; charset=utf-8");
        print_r(json_encode($response));
        exit;
    }



}
