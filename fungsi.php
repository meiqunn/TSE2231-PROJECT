<?php
    session_start();


    $conn = mysqli_connect("localhost","root","","inven");

    if(isset($_POST['addnewbarang'])){
        $hostname = $_POST['hostname'];
        $ipaddress = $_POST['ipaddress'];
        $devicetype = $_POST['devicetype'];
        $deviceseries = $_POST['deviceseries'];
        $serialnumber = $_POST['serialnumber'];
        $portnumber = $_POST['portnumber'];
        
     
       

        $addtotable = mysqli_query($conn, "insert into device (hostname, ipaddress, devicetype, deviceseries, serialnumber, portnumber) 
        values ('$hostname', '$ipaddress', '$devicetype', '$deviceseries', '$serialnumber', '$portnumber')");
        if($addtotable){
            header('location:tables.php');
        } else {
            header('location:tables.php');
        }
    }

//Update barang 
    if(isset($_POST['updatebarang'])){
        $idb = $_POST['idb'];
        $hostname = $_POST['hostname'];
        $ipaddress = $_POST['ipaddress'];
        $devicetype = $_POST['devicetype'];
        $deviceseries = $_POST['deviceseries'];
        $serialnumber = $_POST['serialnumber'];
        $portnumber = $_POST['portnumber'];
       
       

        $update = mysqli_query($conn, "update device set hostname = '$hostname', ipaddress = '$ipaddress', devicetype = '$devicetype', deviceseries = '$deviceseries', serialnumber = '$serialnumber', portnumber = '$portnumber'   where idbarang = '$idb'");
        if($update){
            header('location:tables.php');
        } else {
            header('location:tables.php');

        }
    }

//Hapus Barang
    if(isset($_POST['hapusbarang'])){
        $idb = $_POST['idb'];

        $hapus = mysqli_query($conn, "delete from device where idbarang = '$idb'");
        if($hapus){
            header('location:tables.php');
        } else {
            header('location:tables.php');
        }

    }

?>

<?php



    $conn = mysqli_connect("localhost","root","","inven");

    if(isset($_POST['addnewbarang1'])){
        $hostname = $_POST['hostname'];
        $ipaddress = $_POST['ipaddress'];
        $devicetype = $_POST['devicetype'];
        $deviceseries = $_POST['deviceseries'];
        $serialnumber = $_POST['serialnumber'];
        $portnumber = $_POST['portnumber'];
        
     
       

        $addtotable = mysqli_query($conn, "insert into prabu (hostname, ipaddress, devicetype, deviceseries, serialnumber, portnumber) 
        values ('$hostname', '$ipaddress', '$devicetype', '$deviceseries', '$serialnumber', '$portnumber')");
        if($addtotable){
            header('location:tables prabu.php');
        } else {
            header('location:tables prabu.php');
        }
    }

//Update barang 
    if(isset($_POST['updatebarang1'])){
        $idb = $_POST['idb'];
        
        $hostname = $_POST['hostname'];
        $ipaddress = $_POST['ipaddress'];
        $devicetype = $_POST['devicetype'];
        $deviceseries = $_POST['deviceseries'];
        $serialnumber = $_POST['serialnumber'];
        $portnumber = $_POST['portnumber'];


        $update = mysqli_query($conn, "update prabu set hostname = '$hostname', ipaddress = '$ipaddress', devicetype = '$devicetype', deviceseries = '$deviceseries', serialnumber = '$serialnumber', portnumber = '$portnumber'   where idbarang = '$idb'");
        
        if($update){
            header('location: tables prabu.php');
        } else {
            header('location: tables prabu.php');

        }
    }

//Hapus Barang
    if(isset($_POST['hapusbarang1'])){
        $idb = $_POST['idb'];

        $hapus = mysqli_query($conn, "delete from prabu where idbarang = '$idb'");
        if($hapus){
            header('location: tables prabu.php');
        } else {
            header('location: tables prabu.php');
        }

    }

?>

