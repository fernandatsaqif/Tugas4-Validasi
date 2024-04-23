<?php
    include 'koneksi.php';

    $query = "SELECT * FROM tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 4 - Validasi Formulir</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar" style="background-color: #00cba9;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <img src="img/code.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          -Tugas Terstruktur Form dan DB -
          </a>
        </div>
      </nav>

      <!-- Judul -->
      <div class="container">
        <h1 class="mt-4">Data Siswa</h1>
        <figure>
          <blockquote class="blockquote">
            <p>Berisi data yang telah disimpan di database.</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">( Create Read Update Delete )</cite> <br>
            <cite title="Source Title">Build with Bootstrap 5 - PHP - MySQL</cite>
          </figcaption>
        </figure>

        <a href="kelola.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data</a>


      <!-- Isi tabel -->
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                <thead class = "table-light">
                <tr>
                  <th rowspan="2" width="20%"><center>Nama</center></th>
                  <th colspan="2" width="30%"><center>Lahir</center></th>
                  <th rowspan="2" width="20%"><center>Agama</center></th>
                  <th rowspan="2" width="20%"><center>No. Telpon</center></th>
                  <th rowspan="2" width="20%"><center>Aksi</center></th>
                </tr>
                <tr>
                    <th><center>Tempat</center></th>
                    <th><center>Tanggal</center></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                      while ($result = mysqli_fetch_assoc($sql)) {
                  ?>      
                    <tr>
                        <td><?php echo $result['nama']; ?></td>
                        <td><?php echo $result['tempat']; ?></td>
                        <td><?php echo $result['tanggal_lahir']; ?></td>
                        <td><?php echo $result['agama']; ?></td>
                        <td><?php echo $result['telepon']; ?></td>
                        <td><center>
                            <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Tersebut?')" ><i class="fa fa-trash"></i></a>
                        </center></td>
                    </tr>
                  <?php
                      }
                  ?>      
                </tbody>
                </table>
            </div>
      </div>
      
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cba9" fill-opacity="1" d="M0,160L18.5,138.7C36.9,117,74,75,111,58.7C147.7,43,185,53,222,96C258.5,139,295,213,332,234.7C369.2,256,406,224,443,202.7C480,181,517,171,554,160C590.8,149,628,139,665,154.7C701.5,171,738,213,775,240C812.3,267,849,277,886,266.7C923.1,256,960,224,997,218.7C1033.8,213,1071,235,1108,224C1144.6,213,1182,171,1218,160C1255.4,149,1292,171,1329,170.7C1366.2,171,1403,149,1422,138.7L1440,128L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>

</body>
</html>