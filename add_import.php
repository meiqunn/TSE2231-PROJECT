<?php
require 'fungsi.php';
require 'cek.php';
?>

<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <div class="navbar-brand ps-3">
            <a class="navbar-brand" href="index.php">
                <div class="logo-image">
                <img src="assets/img/pertamina.svg" class="img-fluid">
                </div>
            </a>
            
            </div>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
        
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Addons</div>
                        
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Registered User</h1>
                        
                       
                        <div class="card mb-4">
                            <div class="card-header">
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Device
                            </button>
                            <a href="export.php" class = "btn btn-export">Export Data</a>
                             -->
                             <h2>Import Data Device</h2>
                            </div>
                            <div class="card-body">
                                
                            <form class="" action="" method="post" enctype="multipart/form-data">
			<!-- <input type="file" name="excel" required value=""> -->
            <div class="custom-file">
  <input name="excel" type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
<br>
            <button type="submit" name="import">Import</button>
		</form>

               



                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    
    <?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){

				$hostname = $row[0];
				$ipaddress = $row[1];
				$devicetype = $row[2];
				$deviceseries = $row[3];
				$serialnumber = $row[4];
				$portnumber = $row[5];

            if ($row[1] != NULL) {
                # code...
                mysqli_query($conn, "INSERT INTO device VALUES('', '$hostname', '$ipaddress', '$devicetype','$deviceseries','$serialnumber','$portnumber')");
            }else {
                # code...
                mysqli_query($conn, "INSERT INTO device VALUES('', 'Host Name', '$ipaddress', '$devicetype','$deviceseries','$serialnumber','$portnumber')");

            }

            }

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = 'index.php';
			</script>
			";
		}
		?>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                
                <div class="modal-header">
                    <h4 class="modal-title">Add Device</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <form method="post">
                    <div class="modal-body">
                        <br>
                        <input type = "varchar" name = "hostname" placeholder = "Host Name" class = "form-control" required>
                        <br>
                        <input type= "varchar" name = "ipaddress" class = "form-control" placeholder = "IP Address"  required>
                        <br>
                        <input type =  "varchar" name = "devicetype" placeholder = "Device Type" class = "form-control" required>
                        <br>
                        <input type = "varchar" name = "deviceseries" placeholder = "Device Series" class = "form-control" required>
                        <br>
                        <input type= "varchar" name = "serialnumber" class = "form-control" placeholder = "Serial Number"  required>
                        <br>
                        <input type =  "varchar" name = "portnumber" placeholder = "Port Number" class = "form-control" required>
                        <br>
                        <br>                   
                        <button type = "submit" class = "btn btn-primary" name = "addnewbarang">Submit</button>
                        <button type = "reset" class = "btn btn-secondary" name = "resettext">Reset</button>
                        
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
</html>
