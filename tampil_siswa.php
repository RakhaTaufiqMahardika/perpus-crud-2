<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
 <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Data Siswa</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Data Siswa</h1>
    <form action="tampil_siswa.php" method="post">
        <input type="text" name="cari" id="form-control" placeholder="Search">
    </form>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID Siswa</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Gender</th>
      <th scope="col">Alamat</th>
      <th scope="col">Username</th>
      <th scope="col">Nama Kelas</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        include ("koneksi.php");
        if (isset($_POST["cari"])) {
            // if ($_POST["cari" != NULL)]
            //jika ada keyword pencarian
            $cari = $_POST['cari'];
            $query_siswa = mysqli_query($koneksi,
             "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where
              id_siswa like '%$cari%' or nama_siswa like '%$cari%'
             or tanggal_lahir like '%$cari%' or gender like '%$cari%' or alamat like '%$cari%'
             or username like '%$cari%' or nama_kelas like '%$cari%' ");
        } else {
            //jika tidak ada keyword pencarian
            $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
        }
        
        while ($data_siswa = mysqli_fetch_array ($query_siswa)) { ?>
            <tr>
                <td><?php echo $data_siswa["id_siswa"]; ?></td>
                <td><?php echo $data_siswa["nama_siswa"]; ?></td>
                <td><?php echo $data_siswa["tanggal_lahir"]; ?></td>
                <td><?php echo $data_siswa["gender"]; ?></td>
                <td><?php echo $data_siswa["alamat"]; ?></td>
                <td><?php echo $data_siswa["username"]; ?></td>
                <td><?php echo $data_siswa["nama_kelas"]; ?></td>
            </tr>
        <?php    
        }
    ?>
  </tbody>
</table>
    </div>
   
</body>
</html>