<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ventas</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php
    include("menu.php");
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0">Ventas</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <!-- Main content -->
      <section class="content">
        <?php
          ini_set('display_errors', 1);
          error_reporting(E_ALL);
          require '../../../controller/productController.php';
          $productController = new ProductController();
          $product = $productController->getProductById();
        ?>
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
                <form method="POST">

                  <?php
                  ini_set('display_errors', 1);
                  error_reporting(E_ALL);

                  $productController = new ProductController();
                  $productController->updateProduct();

                  ?>
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $product["id_product"] ?>">
        <label for="inputName">Nombre del producto</label>
        <input name="name" type="text" id="inputName" class="form-control" value="<?php echo $product["name"] ?>">
    </div>
    <div class="form-group">
        <label for="inputSerialNumber">Número de serie</label>
        <input name="serialNumber" type="text" id="inputSerialNumber" class="form-control" value="<?php echo $product["serial_number"] ?>">
    </div>
    <div class="form-group">
        <label for="inputDescription">Descripción del producto (opcional)</label>
        <textarea name="description" id="inputDescription" class="form-control" rows="4"><?php echo $product["description"] ?></textarea>
    </div>
    <div class="form-group">
        <label for="inputPrice">Precio</label>
        <input name="price" type="text" id="inputPrice" class="form-control" value="<?php echo $product["price"] ?>">
    </div>
    <div class="form-group">
        <label for="inputAcquisitionDate">Fecha de adquisición</label>
        <input name="acquisitionDate" type="date" id="inputAcquisitionDate" class="form-control" value="<?php echo $product["acquisition_date"] ?>">
    </div>
    <div class="form-group">
        <label for="inputStock">Stock</label>
        <input name="stock" type="number" id="inputStock" class="form-control" value="<?php echo $product["stock"] ?>">
    </div>
    <div class="form-group">
        <label for="inputAvailability">Disponibilidad</label>
        <input name="availability" type="text" id="inputAvailability" class="form-control" value="<?php echo $product["availability"] ?>">
    </div>
    <input type="submit" value="Actualizar" class="btn btn-success float-right">
</form>

              </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Todo lo que buscas
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 </strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.min.js"></script>
  <script src="../../../dist/js/demo.js"></script>

</body>

</html>