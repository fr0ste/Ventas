<?php
class RoutingModel{
    public static function redirect($action){
        echo $action;
        switch ($action){
            
            
            case "logout":
            case "register":
            case "login":
                $redirect="../../public/".$action.".php";
                header('Refresh: 1; url='.$redirect);
            break;

            case "index":
            case "product-add":
            case "product-detail":
            case "product-edit":
                $redirect="../admin/pages/".$action.".php";
                header('Refresh: 1; url='.$redirect);
            break;

            default:
                $redirect= "public/login";
                header('Refresh: 0; url='.$redirect);
        }
        
    }
}
?>