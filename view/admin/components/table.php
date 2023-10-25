<?php
class UserTableComponent {
  private $encabezados;
  private $usuarios;

  public function __construct($encabezados, $usuarios) {
      $this->encabezados = $encabezados;
      $this->usuarios = $usuarios;
  }

  public function render() {
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
          echo '<button class="btn btn-primary" onclick="location.href=\'index.php?action=actualizar&id=' . $usuario["id_user"] . '\'""><i class="fa fa-pencil-alt"></i></button>';
          echo '<button class="btn btn-danger"><i class="fa fa-trash"></i></button>';
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