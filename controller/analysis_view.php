<?php
error_reporting(0);
include '../session.php';
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Analysis | Gadget Gear</title>
  <link rel="icon" href="../HomeAssets/images/logo.jpeg" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
    td.max-width-50 {
      max-width: 250px;
      max-height: 50px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      color: black;
    }

    .btnDisabled {
      pointer-events: none;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <?php include 'header-admin.php'; ?>
  <div class="content-wrapper">
    <section class="content-header card bg-dark rounded-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family:Franklin Gothic Medium; font-weight:bold;">Inventory Analysis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Analysis</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
	  <td><a class="btn btn-primary" href="analysis_report.php?course_id=<?php echo $course_id; ?>">Generate Report</a></td>
	  <br><br>
        <div class="row">
          <div class="col-12">
            <div class="card border border-dark">
              <div class="card-body">
                <table id="example1" class="table table-striped" cellspacing="0" cellpadding="0">
                  <thead class="thead-dark">
                    <tr>
                     <!-- <th style="width: 10%">ID</th> -->
                      <th style="">Model Name</th>
                      <th style="">Brand</th>
                      <th style="" class="text-center">Category</th>
                      <th style="">Price</th>
					  <th style="">Current Quantity</th>
					  <th style="">Maximum Quantity</th>
					  <th style="">Supplier</th>
					  <th style="">Stock Meter</th>
					  <th style="">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {

                        $modelID = $row['modelID'];
                        $modelName = $row['modelName'];
                        $modelBrand = $row['modelBrand'];
                        $modelCategory = $row['modelCategory'];
                        $modelPrice = $row['modelPrice'];
                        $modelQuantity = $row['modelQuantity'];
						$modelMax = $row['modelMax'];
                        $modelSupplier = $row['modelSupplier'];
                    ?>
                        <tr>
                         <!-- <td><b><?php //echo $modelID; ?></b></td> -->
                          <td><?php echo $modelName; ?></td>
                          <td><?php echo $modelBrand; ?></td>
                          <td><?php echo $modelCategory; ?></td>
                          <td><?php echo $modelPrice; ?></td>
						  <td><?php echo $modelQuantity; ?></td>
						  <td><?php echo $modelMax; ?></td>
						  <td><?php echo $modelSupplier; ?></td>
						  <td class="project_progress">
							  <div class="progress progress-sm">
								<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($modelQuantity / $modelMax) * 100; ?>%" aria-valuenow="<?php echo ($modelQuantity / $modelMax) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
								<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo (1 - ($modelQuantity / $modelMax)) * 100; ?>%" aria-valuenow="<?php echo (1 - ($modelQuantity / $modelMax)) * 100; ?>" aria-valuemin="0" aria-valuemax="100"></div>
							  </div>
							  <small> <?php echo $modelQuantity; ?> / <?php echo $modelMax; ?> </small>
						 </td>
						 <td class="project-state">
							<?php
							  $percentage = ($modelQuantity/$modelMax) * 100;;
							  if ($percentage >= 80) {
								echo '<span class="badge badge-success">Enough Stock</span>';
							  } elseif ($percentage >= 60 && $percentage < 80) {
								echo '<span class="badge badge-warning">Finishing Fast</span>';
							  } elseif ($percentage < 60) {
								echo '<span class="badge badge-danger">Restock Needed</span>';
							  }
							  ?>
						</td>
						 
                        </tr>
                    <?php
                      }
                    } else {
                    }
                    ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

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
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</html>