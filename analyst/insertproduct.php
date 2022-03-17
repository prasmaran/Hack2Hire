<?php
error_reporting(0);
include("../session.php");
include('../config.php');
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Key In Product Data | Gadget Gear</title>
    <link rel = "icon" href ="../HomeAssets/images/logo.jpeg" type = "image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
    thead input 
    {
      width: 100%;
    }
    </style>
    <script language ="javascript" >
          var tmp;
          function f1() {
              tmp = setTimeout("callitrept()", 1000000);
          }
          function callitrept() {
              document.getElementById("testbutton").click();
          }
    </script>
  </head>
  <body onload="f1()"; class="hold-transition sidebar-mini" style="background-color:black;">
    <?php
    include("header-admin.php");
    ?>
    <div class="content-wrapper">
      <section class="content-header card bg-dark rounded-0">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="font-family:Helvetica; font-weight:bold;">Insert New Product</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" style="color:white">Insert New Product</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card border border-dark" style="border-radius: 10px;">
                <div class="card-body">
                  <?php
                    if(isset($_POST['submit'])){
                      header("Location: keyinproduct.php");
						$modelID = $_POST['modelID'];
						$modelName = $_POST['modelName'];
						$modelBrand = $_POST['modelBrand'];
						$modelCategory = $_POST['modelCategory'];
						$modelPrice = $_POST['modelPrice'];
						$modelMax = $_POST['modelMax'];
                        $modelQuantity = $_POST['modelQuantity'];
						$modelSupplier = $_POST['modelSupplier'];
                      $result = mysqli_query($mysqli, "INSERT INTO product (modelID, modelName, modelBrand, modelCategory, modelPrice, modelQuantity, modelMax, modelSupplier) VALUES ('$modelID','$modelName','$modelBrand','$modelCategory','$modelPrice','$modelQuantity','$modelMax','$modelSupplier')");
                    }
                  ?>
                  <form action="" method="post">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model ID</label>
                        </div>
                        <div class="col-md-2">
                          <input type="number" name="modelID" class="form-control" required>
                        </div>   
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model Name</label>
                        </div>  
                        <div class="col-md-2">
							<input type="text" name="modelName" class="form-control" required>
                        </div>  
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model Brand</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="modelBrand" class="form-control" required>
                        </div>   
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model Category</label>
                        </div>
                        <div class="col-md-4">
                            <select name="modelCategory" class="form-select form-select-lg mb-9" aria-label=".form-select-lg example" required>
                              <option value="Mobile Phone">Mobile Phone</option>
                              <option value="Laptop">Laptop</option>
                              <option value="Tablet">Tablet</option>
                              <option value="Smart Watch">Smart Watch</option>
							  <option value="Earphone">Earphone</option>
                          </select>
                        </div>
                      </div>                   
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model Price</label>
                        </div>
                        <div class="col-md-4">
							<input type="number" name="modelPrice" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model Quantity</label>
                        </div>
                        <div class="col-md-4">
							<input type="number" name="modelQuantity" class="form-control" required>
                        </div>
                      </div>    
                    </div>
					<div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Maximum Quantity</label>
                        </div>
                        <div class="col-md-4">
							<input type="number" name="modelMax" class="form-control" required>
                        </div>
                      </div>    
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="">Model Supplier</label>
                        </div>
                        <div class="col-md-2">
                          <input type="text" name="modelSupplier" class="form-control" required> 
                        </div>
                      </div> 
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-2">
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer" style="background-color: black; color:white;">
      <strong>Gadget Gear &copy; 2022 </strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>DELL TECHNOLOGIES</b>
      </div>
    </footer>
    <script src="../plugins/jquery/jquery.min.js"></script> 
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script> 
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> 
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> 
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> 
    <script src="../plugins/jszip/jszip.min.js"></script> 
    <script src="../plugins/pdfmake/pdfmake.min.js"></script> 
    <script src="../plugins/pdfmake/vfs_fonts.js"></script> 
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script> 
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script> 
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> 
    <script src="../dist/js/adminlte.min.js"></script> 
    <script src="../dist/js/demo.js"></script>
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> 
  </body>
</html>