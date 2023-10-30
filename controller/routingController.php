<?php

require_once("/opt/lampp/htdocs/Ventas/model/routingModel.php");
class  RoutingController{
     
	
 static public function redirect($redirect){

	RoutingModel::redirect($redirect);

	}
}
?>
