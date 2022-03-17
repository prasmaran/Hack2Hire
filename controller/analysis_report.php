<?php
error_reporting(0);
include '../session.php';
include '../config.php';
date_default_timezone_set("Kuala Lumpur");

$python = shell_exec('C:\Python39\python.exe moveFile.py');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Absence | Gadget Gear</title>
  <link rel="icon" href="../HomeAssets/images/logo.jpeg" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
  
  <style>
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 10px;
      margin-bottom: 30px;
      border: 1px solid black;
      border-radius: 5px;
      font-size: 16px;
      line-height: 24px;
      font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      color: #555;
    }

    .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
    }

    .invoice-box table td {
      padding: 5px;
      vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
      text-align: right;
    }

    .invoice-box table tr.top table td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
    }

    .invoice-box table tr.information table td {
      padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
      background: blue;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
      color: white;
    }

    .invoice-box table tr.details td {
      padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
      border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
      border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
      }

      .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
      }
    }

    /** RTL **/
    .rtl {
      direction: rtl;
      font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
      text-align: right;
    }

    .rtl table tr td:nth-child(2) {
      text-align: left;
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
            <h1 style="font-family:Franklin Gothic Medium; font-weight:bold;"></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Report</li>
			  
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="invoice-box" style="background-color:white;">

          <table cellpadding="0" cellspacing="0">
            <tr class="top">
              <td colspan="2">
                <table>
                  <tr>
                    <td class="title">
                  <tr>
                    <h1 style="display:block; text-align:center;"></span>Stock Availablity Report</h1>
                  </tr>
              </td>
            </tr>
          </table>
          </td>
          </tr>

          <tr class="heading">
            <td style="color:white; font-weight:bold;"> SECTION 1 </td>
            <td> Report Details </td>
          </tr>
          <tr class="item">
            <td> Report Date </td>
            <td><b><?php echo date('D | d-M-Y'); ?></b></td>
          </tr>
          <tr class="item">
            <td> Verified by </td>
            <td><b><?php echo $loggedin_name;?></b></td>
          </tr>

        <tr class="heading">
          <td style="color:white; font-weight:bold;"> SECTION 2 </td>
          <td> Product List </td>
        </tr>
        <div style="text-align:right;">
          <span>
		  
            <img src="../HomeAssets/images/logo.jpeg" style="height:100px; float:left;">
			<button class="btn btn-primary" id="create_pdf"><i class='far fa-envelope-open'></i>
            </button>
        </div>
        </table>
		<div class="" style="">
                <div class="card-body">
                  <table id="example1" class="table table-striped table-sm" style="background: white; color:black;">
                    <thead class="thead-dark">
                      <tr>
                      <!-- <th style="width: 10%">ID</th> -->
                      <th style="">Model Name</th>
                      <th style="">Brand</th>
                      <th style="" class="text-center">Category</th>
                      <th style="">Price</th>
					  <th style="">Current Quantity</th>
					  <th style="">Threshold</th>
					  <th style="">Supplier</th>
					  <th style="">Stock Meter</th>
					  <th style="">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // Get member rows
                      $query = "SELECT * FROM product ORDER BY modelID ASC";
                      $result = mysqli_query($mysqli, $query);
                          while($row = mysqli_fetch_array($result)){
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
                        <!-- <td><?php //echo $row['modelID']; ?></td> -->
                        <td><?php echo $row['modelName']; ?></td>
                        <td><?php echo $row['modelBrand']; ?></td>
                        <td><?php echo $row['modelCategory']; ?></td>
                        <td><?php echo $row['modelPrice']; ?></td>
                        <td><?php echo $row['modelQuantity']; ?></td>
						<td><?php echo $row['modelMax']; ?></td>
                        <td><?php echo $row['modelSupplier']; ?></td>
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
                      ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
              </div>
      </div>
	  
    </section>
  </div>
</body>


<footer class="main-footer" style="background-color: black; color:white;"><strong>FCSIT ATTENDANCE &copy; 2021</strong>FYP 1.
  <div class="float-right d-none d-sm-inline-block"><b>University of Malaya</b></div>
</footer>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
</html>


<script src="../dist/js/demo.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script>
    $(document).ready(function () {
        var form = $('.content'),
            cache_width = form.width(),
            a4 = [630,630]; // for a4 size paper width and height  

        $('#create_pdf').on('click', function () {
            $('body').scrollTop(0);
            createPDF();
        });

		var filenewname = document.getElemenById("getdate").value;
		
        function createPDF() {
            getCanvas().then(function (canvas) {
                var
                    img = canvas.toDataURL("image/png"),
                    doc = new jsPDF({
                        unit: 'px',
                        format: 'a4'
                    });
                doc.addImage(img, 'JPEG', 5, 5);
                doc.save(`restock.pdf`);
                form.width(cache_width);
				location.href = 'email.php'
            });
        }

        function getCanvas() {
            form.width((a4[0] * 1.333)-80).css('max-width', 'none');
            return html2canvas(form, {
                imageTimeout: 2000,
                removeContainer: true
            });
        }
    });
</script>