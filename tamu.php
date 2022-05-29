<?php
include("koneksi.php");
$ambil=mysqli_query($connection, "SELECT * FROM tamu ORDER BY ID desc");
?>
<html>
<head>
    <title>HOME</title>
    <h1 align="center" style="font-family: segoe-script; font-size:50px;">BUKU TAMU</h1>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<br>
<table class="table table-striped table-hover" align="center">
    <thead>
        <tr>
            <th class="text-center">Nama Lengkap</th>  
            <th class="text-center">Nama</th>     
            <th class="text-center">Alamat</th>     
            <th class="text-center">No.HP</th>
            <th class="text-center">Option</th>     
        </tr>
    </thead>
    <?php
        include "koneksi.php";
        $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
        $limit = 50;
        $limitStart = ($page - 1) * $limit;
        $ambil = mysqli_query($connection, "SELECT * FROM tamu ORDER BY ID DESC LIMIT ".$limitStart.",".$limit);      
        $no = $limitStart + 1;
       while($data=mysqli_fetch_assoc($ambil)){
       echo"<tr align='center'>";
       echo"<td>".$data['NamaLengkap']."</td>";
       echo"<td>".$data['Nama']."</td>";
       echo"<td>".$data['Alamat']."</td>";
       echo"<td>".$data['Handphone']."</td>";
       echo"<td align='center'><a class='btn btn-warning' href='update.php?id=$data[ID]'>Edit</a> <a class='btn btn-danger' href='hapus.php?id=$data[ID]'>Hapus</a></td>";
       }
    ?>
</table>
    <div align="center">
        <a href="tambah.php" class="btn btn-success">Tambah Tamu</a>
    </div>
    <br>
    <br>
    <div align="center">
      <ul class="pagination">
        <?php
        if($page == 1){ 
          ?>        
          <li class="disabled"><a href="#" class="btn btn-default" >Previous</a></li>
          <?php
        }
        else{ 
          $LinkPrev = ($page > 1)? $page - 1 : 1;
          ?>
          <li><a href="tamu.php?page=<?php echo $LinkPrev; ?>" >Previous</a></li>
          <?php
          }
          ?>
        <?php
        $ambil = mysqli_query($connection, "SELECT * FROM tamu");        
        $JumlahData = mysqli_num_rows($ambil);      
        $jumlahPage = ceil($JumlahData / $limit); 
        $jumlahNumber = 9; 
        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
        
        for($i = $startNumber; $i <= $endNumber; $i++){
          $linkActive = ($page == $i)? ' class="active"' : '';
          ?>
          <li<?php echo $linkActive; ?>><a href="tamu.php?page=<?php echo $i; ?>" class="btn btn-primary" ><?php echo $i; ?></a></li>
          <?php
          }
          ?>
        
        <?php       
        if($page == $jumlahPage){ 
          ?>
          <li class="disabled"><a href="#" class="btn btn-primary" >Next</a></li>
          <?php
        }
        else{
          $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
          ?>
          <li><a href="tamu.php?page=<?php echo $linkNext; ?>" class="btn btn-default" >Next</a></li>
          <?php
        }
        ?>
      </ul>
    </div>
</body>
</html>
