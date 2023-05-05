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
        <title>Pertamina Hulu Rokan</title>
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
                        
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Inventory
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            
                                            <a class="nav-link" href="tables prabu.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                                PHR Prabumulih
                                            </a>
                                            <a class="nav-link" href="tables.php">
                                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                                PHR Limau
                                            </a>
                                        </nav>
                                    </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        NetWork Monitoring
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                                Zabbix
                                            </a>
                                            <a class="nav-link" href="#">
                                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                                Grafana
                                            </a>
                                        </nav>
                                    </div>
                            <div class="sb-sidenav-menu-heading">Log out</div>

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
                        <div class = "row">
                            <div class = "col-lg-12">
                                <h1 class="mt-4">PHR Prabumulih</h1>
                                <ol class = "breadcrumb mb-4">
                                    <li><a href =""><i class="fa fa-dashboard"></i></a></li>
                                    <li><a href = "index.php"> Dashboard </a></li>
                                    <li class = "active"> PHR Prabumulih </li>
                                </ol>
                            </div>
                        </div>   
                       
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Device
                            </button>
                            <a href="export prabu.php" class = "btn btn-info text-white">Export Data</a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                                Import Data
                            </button>
                            
                            
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class = "table table-bordered" id="datatablesSimple" width="100%" cellspacing ="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Host Name</th>
                                                <th>IP Address</th>
                                                <th>Device Type</th>
                                                <th>Device Series</th>
                                                <th>Serial Number</th>
                                                <th>Port Number</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $ambilsemuadatadevice = mysqli_query($conn, "select * from prabu WHERE NOT hostname ='Host Name'");
                                            $i = +1;
                                            while($data = mysqli_fetch_array($ambilsemuadatadevice)){
                                                
                                                $hostname = $data['hostname'];
                                                $ipaddress = $data['ipaddress'];
                                                $devicetype = $data['devicetype'];
                                                $deviceseries = $data['deviceseries'];
                                                $serialnumber = $data['serialnumber'];
                                                $portnumber = $data['portnumber'];
                                                $idb = $data['idbarang'];
                                               


                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$hostname;?></td>
                                                <td><?=$ipaddress;?></td>
                                                <td><?=$devicetype;?></td>
                                                <td><?=$deviceseries;?></td>
                                                <td><?=$serialnumber;?></td>
                                                <td><?=$portnumber;?></td>
                                                
                                                
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idb;?>">
                                                        Edit
                                                    </button>
                                                    <input  type = "hidden" name = "editidbarang" value = "<?=$devicetype;?>">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idb;?>">
                                                        Delete
                                                    </button> 
                                                </td>
                                                
                                                
                                            </tr>
                                        
                                                <!-- edit modal -->
                                                <div class="modal fade" id="edit<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Device</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <br>
                                                                <input type = "varchar" name = "hostname"  value = "<?=$hostname?>" class = "form-control" placeholder = "Host Name" required>
                                                                <br>
                                                                <input type= "varchar" name = "ipaddress" class = "form-control" value = "<?=$ipaddress?>" placeholder = "IP Address" required>
                                                                <br>
                                                                <select name= "devicetype" class = "form-control">
                                                                        <?php 
                                                                            $ambilsemuadatatype= mysqli_query($conn, "select * from devicetype");
                                                                            while($fetcharray = mysqli_fetch_array($ambilsemuadatatype)){
                                                                                $device = $fetcharray['device'];
                                                                                

                                                                        ?>

                                                                        <option><?=$device;?></option>

                                                                        <?php
                                                                            }
                                                                        ?>
                                                                </select>
                                                                <br>
                                                                <input type= "varchar" name = "deviceseries" class = "form-control" value = "<?=$deviceseries?>" placeholder = "Device Series" required>
                                                                <br>
                                                                <input type = "varchar" name = "serialnumber"  value = "<?=$serialnumber?>" class = "form-control" placeholder = "Serial Number" required>
                                                                <br>
                                                                <input type= "varchar" name = "portnumber" class = "form-control" value = "<?=$portnumber?>"  placeholder = "Port Number" required>
                                                                <br>
                                                                <input type="hidden" name = "idb" value = "<?=$idb;?>">
                                                                <button type = "submit" class = "btn btn-primary" name = "updatebarang1">Save</button>
                                                                
                                                                
                                                            </div>
                                                        </form>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- delete modal -->
                                                <div class="modal fade" id="delete<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Device</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                ARE YOU SURE YOU WANT TO DELETE? 
                                                                <input type="hidden" name = "idb" value = "<?=$idb;?>">
                                                                <br>
                                                                <br>
                                                                <button type = "submit" class = "btn btn-danger" name = "hapusbarang1">Ya</button>
                                                                <button type = "reset" class = "btn btn-secondary" data-bs-dismiss = "modal" name = "resettext" margin-right="modal">No</button>
                                                                
                                                            </div>
                                                        </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            };

                                            ?>

                                        </tbody>
                                    </table>
                                </div>
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
      
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                
                <div class="modal-header">
                    <h4 class="modal-title">Add Device</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                </div>
                
                <form method="post">
                    <div class="modal-body">
                        <br>
                        <input type = "varchar" name = "hostname" placeholder = "Host Name" class = "form-control" required>
                        <br>
                        <input type= "varchar" name = "ipaddress" class = "form-control" placeholder = "IP Address"  required>
                        <br>
                        <select name= "devicetype" class = "form-control">
                                <?php 
                                    $ambilsemuadatatype= mysqli_query($conn, "select * from devicetype");
                                    while($fetcharray = mysqli_fetch_array($ambilsemuadatatype)){
                                        $device = $fetcharray['device'];
                                        

                                ?>

                                <option><?=$device;?></option>

                                <?php
                                    }
                                ?>
                        </select>
                        <br>
                        <input type = "varchar" name = "deviceseries" placeholder = "Device Series" class = "form-control" required>
                        <br>
                        <input type= "varchar" name = "serialnumber" class = "form-control" placeholder = "Serial Number"  required>
                        <br>
                        <input type =  "varchar" name = "portnumber" placeholder = "Port Number" class = "form-control" required>
                        <br>
                        <br>                   
                        <button type = "submit" class = "btn btn-primary" name = "addnewbarang1">Submit</button>
                        <button type = "reset" class = "btn btn-secondary" name = "resettext">Reset</button>
                        
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="importModal" name=importmdl >
            <div class="modal-dialog">
                <div class="modal-content">

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

                            if ($row[5] || ($row<= 3) ) {
                                # code...
                                mysqli_query($conn, "INSERT INTO prabu VALUES('','$hostname', '$ipaddress', '$devicetype','$deviceseries','$serialnumber','$portnumber')");
                            }else {
                                # code...
                                

                            }

                        }
                        

                        echo
                        "
                        <script>
                        alert('Succesfully Imported');
                        document.location.href = 'tables prabu.php';
                        </script>
                        ";
                    }
               
		        ?>
                <div class="modal-header">
                    <h4 class="modal-title">Import Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="custom-file">
                            <input name="excel" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                        <br>
                        <button type="submit" name="import" class="btn btn-primary" >Import</button>
                       
                        <a style="margin-left:218px;" href="assets/templatebaru.xlsx" class="btn btn-primary">
                            <span class="glyphicon glyphicon-download"></span>
                            Download Template
                        </a>
                        
                    </div>

                    
                </form>
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
            
        </div>

        

        

        
</html>
