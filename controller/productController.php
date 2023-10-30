<?php

require_once("../../../model/productModel.php");
require_once("../../../shared/components/message.php");
require_once("routingController.php");
class ProductController
{
    public function createProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $acquisitionDate = $_POST['acquisitionDate'];
            $serialNumber = $_POST['serialNumber'];
            $availability = $_POST['availability'];
            $description = $_POST['description'];
            $stock = $_POST['stock'];

            if (isset($name, $price, $acquisitionDate, $serialNumber)) {
                // Los campos necesarios están presentes en la solicitud
                $productModel = new ProductModel();
                $result = $productModel->createProduct($name, $price, $stock, $acquisitionDate, $serialNumber, $availability, $description);

                if ($result) {
                    // Inserción exitosa, redirige a la página de productos o muestra un mensaje de éxito
                    AlertComponent::mostrarAlerta("success", "se ha insertado el producto");
                } else {
                    // Error en la inserción, muestra un mensaje de error
                    AlertComponent::mostrarAlerta("danger", "error al crear el producto");
                }
            } else {
                // Faltan campos requeridos, muestra un mensaje de error
                AlertComponent::mostrarAlerta("warning", "faltan campos requeridos");
            }
        } else {
            // El formulario de creación no se envió por POST
            echo "No se enviaron datos por POST para crear el producto.";
        }
    }

    public function getProductById()
    {
        $productId = $_GET['id'];
        $productModel = new ProductModel(); // Crear una instancia del modelo de producto
        $product = $productModel->getProductById($productId); // Llamar al método del modelo

        if ($product) {
            // El producto fue encontrado, puedes cargar la vista o realizar acciones adicionales
            return $product;
        } else {
            // El producto no fue encontrado, manejar el error o redirigir
            echo "Producto no encontrado";
        }
    }
    public function getProducts()
    {
        $productModel = new ProductModel();
        $products = $productModel->getProducts();

        return $products;
    }


    public function updateProduct()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $acquisitionDate = $_POST['acquisitionDate'];
            $serialNumber = $_POST['serialNumber'];
            $availability = $_POST['availability'];
            $description = $_POST['description'];
        
            // Validación de entrada (puedes agregar más validaciones según tus necesidades)
            if (isset($id, $name, $price, $acquisitionDate, $serialNumber) && is_numeric($price) && is_numeric($stock)) {
                // Los campos necesarios están presentes y tienen el formato correcto
        
                $productModel = new ProductModel();
        
                // Sentencia preparada
                $result = $productModel->updateProduct($id, $name, $price, $stock, $acquisitionDate, $serialNumber, $availability, $description);
        
                if ($result) {
                    // Actualización exitosa, redirige a la página de productos o muestra un mensaje de éxito
                    AlertComponent::mostrarAlerta("success", "se han actualizado los datos");

                } else {
                    // Error en la actualización, muestra un mensaje de error
                    AlertComponent::mostrarAlerta("danger", "Hubo un error al actualizar los datos");
                }
            } else {
                // Faltan campos requeridos o tienen un formato incorrecto, muestra un mensaje de error
                AlertComponent::mostrarAlerta("warning", "Faltan campos requeridos o los datos tienen un formato incorrecto");
            }
        } else {
            // El formulario de actualización no se envió por POST
            echo "No se enviaron datos por POST para actualizar el producto.";
        }
    }

    public function deleteProduct()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        if (isset($id)) {
            // ID del producto proporcionado
            $productModel = new ProductModel();
            $result = $productModel->deleteProduct($id);

            if ($result) {
                // Eliminación exitosa, redirige a la página de productos o muestra un mensaje de éxito
                AlertComponent::mostrarAlerta("success", "El producto ha sido eliminado correctamente.");
            } else {
                // Error en la eliminación, muestra un mensaje de error
                AlertComponent::mostrarAlerta("danger", "Hubo un error al eliminar el producto.");
            }
        } else {
            // Falta el campo requerido (ID), muestra un mensaje de error
            AlertComponent::mostrarAlerta("warning", "Falta el ID del producto que se va a eliminar.");
        }
    } else {
        // La solicitud no se envió por POST
        echo "No se enviaron datos por POST para eliminar el producto.";
    }
}


}


?>