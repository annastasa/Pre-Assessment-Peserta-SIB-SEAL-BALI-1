<html>
<head>
    <title>TAMBAH DATA</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <h1 align="center" style=" font-size :300%; font-family: segoe-script" >BUKU TAMU</h1>
    </div>
    <form action="tambah.php" method="post" class="col-md-12" name="Form1">
        <div class="mb-3">
            <label for="NamaLengkap" class="form-label" >Nama Lengkap</label>
            <input type="text" class="form-control" id="NamaLengkap" name="NamaLengkap" required>
        </div>   
        <div>
            <label for="Nama" class="form-label" >Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" required>
        </div>      
        <div>
            <label for="Alamat" class="form-label" >Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat" required>
        </div>        
        <div>    
            <label for="Handphone" class="form-label" >No.HP</label>
            <input type="number" class="form-control" id="Handphone" name="Handphone" required>
        </div>        
        <br>
        <div align="center" border="1">
            <input type="submit" class="btn btn-primary" name="tambah" value="TAMBAH">
        </div>
    </form>
    <br>
    <p align="center" style="font-size: 15px;">Tidak Ingin Menambahkan Data?</p>
    <div align="center">
        <a href="tamu.php" class="btn btn-success">HOME</a>
    </div>
<?php
    if(isset($_POST['tambah'])){
        include("koneksi.php");      
        $namaLengkap=$_POST['NamaLengkap'];
        $nama=$_POST['Nama'];
        $alamat=$_POST['Alamat'];
        $noHP=$_POST['Handphone'];
        $perintah=mysqli_query($connection, "INSERT INTO tamu(NamaLengkap,Nama,Alamat,Handphone) VALUES('$namaLengkap','$nama','$alamat','$noHP')");
    }
?>
</body>
</html>
