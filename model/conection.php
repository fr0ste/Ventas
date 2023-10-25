<?php
class Conection {
    const HOST = "localhost";
    const DATABASE = "Ventas";
    const USER = "root";
    const PASSWORD = "froste123";

    static public function connect() {
        try {
            $connection = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DATABASE, self::USER, self::PASSWORD);

            // Configura PDO para que arroje excepciones en caso de errores
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $e) {
            // Maneja la excepción
            // Aquí puedes registrar el error, mostrar un mensaje de error o realizar otras acciones
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
    }
}

?>