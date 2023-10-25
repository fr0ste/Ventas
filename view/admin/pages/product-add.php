<?php

class ProductFormComponent {
  public function render() {
      echo '
      <!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Información general</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="inputName">Nombre del producto</label>
          <input type="text" id="inputName" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputStock">Numero de serie</label>
          <input type="text" id="inputProjectLeader" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputDescription">Descripción del producto (opcional)</label>
          <textarea id="inputDescription" class="form-control" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="inputPrice">Precio</label>
          <input type="text" id="inputClientCompany" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputStock">Fecha de adquicisión</label>
          <input type="text" id="inputProjectLeader" class="form-control">
        </div>
        <div class="form-group">
          <label for="inputStock">Disponible</label>
          <input type="text" id="inputProjectLeader" class="form-control">
        </div>
      </div>
      <!-- /.card-body -->
    </div>

  </div>
  <div class="row">
    <div class="col-12">
      <a href="#" class="btn btn-secondary">Cancelar</a>
      <input type="submit" value="Crear nuevo" class="btn btn-success float-right">
    </div>
  </div>
</div>
</section>';
  }
}

?>