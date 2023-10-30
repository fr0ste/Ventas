<?php
    require_once("conection.php");
    class ProductModel{
        public function createProduct($name, $price, $stock, $acquisitionDate, $serialNumber, $availability, $description) {
            $stmt = Conection::connect()->prepare("INSERT INTO product (name, price, stock, acquisition_date, serial_number, availability, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $name, PDO::PARAM_STR);
            $stmt->bindParam(2, $price, PDO::PARAM_STR);
            $stmt->bindParam(3, $stock, PDO::PARAM_INT);
            $stmt->bindParam(4, $acquisitionDate, PDO::PARAM_STR);
            $stmt->bindParam(5, $serialNumber, PDO::PARAM_STR);
            $stmt->bindParam(6, $availability, PDO::PARAM_INT);
            $stmt->bindParam(7, $description, PDO::PARAM_STR);
        
            if ($stmt->execute()) {
                return true; // Inserción exitosa
            } else {
                return false; // Error en la inserción
            }
        }

        public function getProductById($productId) {
            $stmt = Conection::connect()->prepare("SELECT * FROM product WHERE id_product = ?");
            $stmt->bindParam(1, $productId, PDO::PARAM_INT);
            $stmt->execute();
        
            // Utiliza fetch para obtener el producto como un array asociativo
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $product;
        }
 
        

        public function getProducts() {
            $stmt = Conection::connect()->prepare("SELECT * FROM product");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateProduct($id, $name, $price, $stock, $acquisitionDate, $serialNumber, $availability, $description){
            $stmt = Conection::connect()->prepare("UPDATE product SET name = ?, price = ?, stock = ?, acquisition_date = ?, serial_number = ?, availability = ?, description = ? WHERE id_product = ?");
            $stmt->bindParam(1, $name, PDO::PARAM_STR);
            $stmt->bindParam(2, $price, PDO::PARAM_STR);
            $stmt->bindParam(3, $stock, PDO::PARAM_INT);
            $stmt->bindParam(4, $acquisitionDate, PDO::PARAM_STR);
            $stmt->bindParam(5, $serialNumber, PDO::PARAM_STR);
            $stmt->bindParam(6, $availability, PDO::PARAM_INT);
            $stmt->bindParam(7, $description, PDO::PARAM_STR);
            $stmt->bindParam(8, $id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true; // Actualización exitosa
            }

            return false;
        }
        
        public function deleteProduct($id) {
            $stmt = Conection::connect()->prepare("DELETE FROM products WHERE id_product = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true; // Eliminación exitosa
            } else {
                return false; // Error en la eliminación
            }
        }
    }
?>