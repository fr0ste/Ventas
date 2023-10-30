<?php

require_once("routingController.php");
require_once("../../model/authModel.php");
require_once("../../shared/components/message.php");

    class AuthController{
        public function login(){
            $login = false;
            echo "entered to login";

            if (isset($_POST["email"]) && isset($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];

                echo $email . "" . $password ."";

                $login = new AuthModel();
                $login = $login->login($email,$password);
                
                if($login){
                    
                    $_SESSION["vingreso"] = "OK";
                    RoutingController::redirect("index");
                }else{
                    AlertComponent::mostrarAlerta("warning","Los datos son incorrectos");
                }

            }

            
            
        }
    
        public function logout(){
        }
    
        public function register(){

            $auth = false;

            if (isset($_POST["email"]) && $_POST["email"]!="" && isset($_POST["username"]) && $_POST["email"]!="" && isset($_POST["password"]) && $_POST["password"] && isset($_POST["passconf"]) && $_POST["passconf"]) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $username = $_POST["username"];
                $passconf = $_POST["passconf"];

                if($password == $passconf){
                    $auth = new AuthModel();
                    $auth = $auth->register($username, $password, $email);
                    
                }else{
                    AlertComponent::mostrarAlerta("warning","Las contraseñas no coinciden");
                    return;
                }

                if($auth){
                    RoutingController::redirect("login");
                }else{
                    AlertComponent::mostrarAlerta("danger","el usuario ya existe");
                }
                
            }

            
                
            
        } 
    }
?>