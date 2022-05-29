<?php
include("koneksi.php");
 
if(isset($_POST['update']))
{	
	$id = $_POST['ID'];
	
	$namaLengkap=$_POST['NamaLengkap'];
	$nama=$_POST['Nama'];
	$alamat=$_POST['Alamat'];
	$noHP=$_POST['Handphone'];
		
	$result = mysqli_query($connection, "UPDATE tamu SET NamaLengkap='$namaLengkap',Nama='$nama',Alamat='$alamat', Handphone='$noHP' WHERE ID=$id");
	header("Location: tamu.php");
}
?>
<?php
$id = $_GET['id'];
 
$result = mysqli_query($connection, "SELECT * FROM tamu WHERE id=$id");
 
while($tamu = mysqli_fetch_array($result))
{
	$namaLengkap=$tamu['NamaLengkap'];
	$nama=$tamu['Nama'];
	$alamat=$tamu['Alamat'];
	$noHP=$tamu['Handphone'];
}
?>
<html>
<head>	
	<title>EDIT DATA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
 
<body>
	<div class="container">
		<div align="center">
		<h1><b>DATA TAMU</b></h1>
    </div>
	<br/><br/>

	<form name="update_city" method="post" class="col-md-12" action="update.php">
		<div class="mb-3">
			<label for="NamaLengkap" class="form-label">Nama Lengkap</label>
			<input class="form-control" type="text" id="NamaLengkap" name="NamaLengkap" value=<?php echo $namaLengkap;?> required>
		</div><br>
		<div class="mb-3">
			<label for="Nama" class="form-label">Nama</label>
			<input class="form-control" type="text" id="Nama" name="Nama" value=<?php echo $nama;?> required>
		</div><br>
		<div class="mb-3">
			<label for="Alamat" class="form-label">Alamat</label>
			<input class="form-control" type="text" id="Alamat" name="Alamat" value=<?php echo $alamat;?> required>
		</div><br>
		<div class="mb-3">
			<label for="NoHP" class="form-label">Handphone</label>
			<input class="form-control" type="text" id="Handphone" name="Handphone" value=<?php echo $noHP;?> required>
		</div><br>
		<div class="text-right">
			<input type="hidden" name="ID" value=<?php echo $_GET['id'];?>>
			<input class="btn btn-success btn-xl" type="submit" name="update" value="EDIT">
            <a href="tamu.php" class="btn btn-success">HOME</a>
		</div>
	</form>
</body>
</html>