<?php
require 'fungsi.php';
require 'config.php';


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
