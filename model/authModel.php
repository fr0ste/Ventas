<?php
require_once("conection.php");
require_once("../../shared/components/message.php");
class AuthModel{
    public function login($email, $password) {
        // Definir la tabla de usuarios en la base de datos
        $tabla = "users";
        
        // Realizar una consulta preparada para buscar al usuario por nombre de usuario y contraseña
        $stmt = Conection::connect()->prepare("SELECT * FROM $tabla WHERE email = ? AND pass = ?");
        
        // Vincular los valores de usuario y contraseña a la consulta
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->bindParam(2, $password, PDO::PARAM_STR);
        
        // Ejecutar la consulta
        $stmt->execute();

        // Comprobar si se encontró un usuario con las credenciales proporcionadas
        if ($stmt->rowCount() == 1) {
            return true; // Inicio de sesión exitoso
        } else {
            return false; // Error de inicio de sesión
        }
    }


    public function logout(){
    }

    public function register($username, $password, $email){

            try {
                $tabla = "users";

            $stmt = Conection::connect()->prepare("INSERT INTO $tabla(username,pass,email) VALUES (?,?,?)");
             
            $stmt->bindParam(1, $username, PDO::PARAM_STR);
            $stmt->bindParam(2, $password, PDO::PARAM_STR);
            $stmt->bindParam(3, $email, PDO::PARAM_STR);
            //SE ENVIA LA CONFIRMACION DE CONEXION ALA VISTA
            if ($stmt->execute()) {
                return true;
            } else {
                
                return false;
            }
        } catch (PDOException $e) {
            AlertComponent::mostrarAlerta("danger",$e->getMessage()); 
        }

        return false;
            
        
        //$stmt->close();//CERRAMOS EL STMT
        
    } 
}

?>