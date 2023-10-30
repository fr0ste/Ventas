<?php

class UserTableComponent
{
    private $encabezados;
    private $usuarios;

    public function __construct($encabezados, $usuarios)
    {
        $this->encabezados = $encabezados;
        $this->usuarios = $usuarios;
    }

    public function render()
    {
        
        echo '<div class="container mt-3">';
        echo '<h2>Tabla de Registro</h2>';
        echo '<table class="table">';
        echo '<thead class="thead-dark">'; // Estilo de encabezado oscuro
        echo '<tr>';

        foreach ($this->encabezados as $encabezado) {
            echo '<th>' . $encabezado . '</th>';
        }

        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($this->usuarios as $usuario) {
            echo '<tr>';
            foreach ($usuario as $valor) {
                echo '<td>' . $valor . '</td>';
            }
            echo '<td>';
            echo '<div class="btn-group">';
            echo '<button class="btn btn-primary" onclick="location.href=\'product-edit.php?action=actualizar&id=' . $usuario["id_product"] . '\'""><i class="fa fa-pencil-alt"></i></button>';
            echo '<form method="POST">'; // Ajusta la acción al controlador y la vista correspondientes
            echo '<input type="hidden" name="id" value="' . $usuario["id_product"] . '">';
            echo '<button type="submit" name="delete_product" class="btn btn-danger"><i class="fa       fa-trash"></i></button>';
            echo '</form>';
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
}

?>