
<?php
require 'fungsi.php';
require 'cek.php';
?>
<html>
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inventory PHR</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body class="sb-nav-fixed" >
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
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    
                
                        <div class="container">
                                    <h2>EXPORT</h2>
                                    <h4>(Inventory)</h4>
                                        <div class="data-tables datatable-dark">
                                            
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
                                                                        
                                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $ambilsemuadatadevice = mysqli_query($conn, "select * from device");
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
                                                                        <td><?php echo $hostname;?></td>
                                                                        <td><?php echo $ipaddress;?></td>
                                                                        <td><?php echo $devicetype;?></td>
                                                                        <td><?php echo $deviceseries;?></td>
                                                                        <td><?php echo $serialnumber;?></td>
                                                                        <td><?php echo $portnumber;?></td>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                    </tr>
                                                                
                                                                    

                                                                    
                                                                    <?php
                                                                    };

                                                                    ?>

                                                                </tbody>
                                                                
                                                            </table>
                                                            <a href="tables.php" class="btn btn-danger">Back</a>
                                                                
                                        </div>
                        </div>
                            
                        <script>
                        $(document).ready(function() {
                            $('#datatablesSimple').DataTable( {
                                dom: 'Bfrtip',
                                buttons: [
                                    'excel', 'pdf', 'print'
                                ]
                            } );
                        } );

                        </script>
                </main>
                
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

	

</body>

</html>
