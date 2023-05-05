<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>
		<hr>
		<table border = 1>
			<tr>
				<td>#</td>
				<td>Host Name</td>
				<td>IP Address</td>
				<td>Device Type</td>
				<td>Device Series</td>
				<td>Number Series</td>
				<td>Number Port</td>

			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM device");
			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $i++; ?> </td>
				<td> <?php echo $row["hostname"]; ?> </td>
				<td> <?php echo $row["ipaddress"]; ?> </td>
				<td> <?php echo $row["devicetype"]; ?> </td>
				<td> <?php echo $row["serialnumber"]; ?> </td>
				<td> <?php echo $row["portnumber"]; ?> </td>

			</tr>
			<?php endforeach; ?>
		</table>
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

				mysqli_query($conn, "INSERT INTO device VALUES('', '$hostname', '$ipaddress', '$devicetype','$deviceseries','$serialnumber','$portnumber')");
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
	</body>
</html>
