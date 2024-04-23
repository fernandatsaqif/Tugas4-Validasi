<!DOCTYPE html>

<?php
   include 'koneksi.php';

   $id_siswa = '';
   $nama = '';
   $tempat = '';
   $tgl = '';
   $agama = '';
   $telepon = '';

  if(isset($_GET['ubah'])){
    $id_siswa = $_GET['ubah'];

    $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $tempat = $result['tempat'];
    $tgl = $result['tanggal_lahir'];
    $agama = $result['agama'];
    $telepon = $result['telepon'];

    //var_dump($result);
    //die();
  }
?>

<html>
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

<nav class="navbar" style="background-color: #00cba9;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <img src="img/code.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
          -Tugas Terstruktur Form dan DB -
          </a>
        </div>
      </nav>

      <div class="container">
      <h1 class="mt-4">CRUD Form</h1>
        <figure>
          <blockquote class="blockquote">
            <p>Silahkan isi/edit data diri dengan format yang benar.</p>
          </blockquote>
        </figure>

        <form method="POST" action="proses.php" enctype="multipart/form-data">

          <input type="hidden" value="<?php echo $id_siswa ?>" name="id_siswa" >

          <div class="mb-3 row">
              <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="Nama" placeholder="E.g : Aldo" required value="<?php echo $nama; ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="Tempat" class="col-sm-2 col-form-label">Tempat</label>
              <div class="col-sm-10">
                <input type="text" name="tempat" class="form-control" id="Tempat" placeholder="E.g : Sidoarjo" required value="<?php echo $tempat; ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="Tanggal"  class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" name="tanggal_lahir" class="form-control" id="Tanggal" placeholder="Silahkan memilih input Tanggal" value="<?php echo $tgl; ?>">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
              <div class="col-sm-10">
                  <select required value="<?php echo $agama; ?>" id="Agama" name="agama" class="form-select">
                      <option value=""  > pilih salah satu </option>
                      <option <?php if($agama == 'Islam'){echo "selected";} ?> value="Islam">Islam</option>
                      <option <?php if($agama == 'Kristen'){echo "selected";} ?> value="Kristen">Kristen</option>
                      <option <?php if($agama == 'Hindu'){echo "selected";} ?> value="Hindu">Hindu</option>
                      <option <?php if($agama == 'Budha'){echo "selected";} ?> value="Budha">Budha</option>
                      <option <?php if($agama == 'Khongucu'){echo "selected";} ?> value="Khongucu">Khongucu</option>
                      

                    </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="Telepon" class="col-sm-2 col-form-label">Telepon</label>
              <div class="col-sm-10">
                    <td>
                         <input type="text" name="telepon" id="telepon" oninput="validatePhoneNumber()">
                         <br>
                         <span id="phone-error" style="color: red;"></span>
                    </td>
            </div>

            <div class="mb-3 row mt-4">
              <div class="col">
                  <?php
                    if(isset($_GET['ubah'])){
                  ?>
                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Simpan perubahan 
                    </button>
                  <?php
                      } else {
                  ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        Tambahkan 
                    </button>
                  <?php
                      } 
                  ?>
                  <a href="index.php" type="button" class="btn btn-danger">
                      <i class="fa fa-reply" aria-hidden="true"></i>
                      Batal 
                  </a>
              </div>
            </div>
        </form>
      </div>

      <script>
            function validatePhoneNumber() {
                var phoneNumber = document.getElementById('telepon').value;
                var errorMessage = document.getElementById('phone-error');

                // Check if phone number starts with "628" or "08"
                if (!phoneNumber.startsWith('628') && !phoneNumber.startsWith('08')) {
                    errorMessage.innerHTML = 'Nomor telepon tidak valid, no harus diawali dengan 628 atau 08.';
                    return false; // Prevent form submission
                }

                errorMessage.innerHTML = ''; // Clear error message if phone number is valid
                return true; // Allow form submission
            }

            function validateForm() {
                // Add more validation logic here if needed
                return validatePhoneNumber(); // Validate phone number before submitting the form
            }
        </script>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00cba9" fill-opacity="1" d="M0,160L18.5,138.7C36.9,117,74,75,111,58.7C147.7,43,185,53,222,96C258.5,139,295,213,332,234.7C369.2,256,406,224,443,202.7C480,181,517,171,554,160C590.8,149,628,139,665,154.7C701.5,171,738,213,775,240C812.3,267,849,277,886,266.7C923.1,256,960,224,997,218.7C1033.8,213,1071,235,1108,224C1144.6,213,1182,171,1218,160C1255.4,149,1292,171,1329,170.7C1366.2,171,1403,149,1422,138.7L1440,128L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path></svg>

</body>
</html>