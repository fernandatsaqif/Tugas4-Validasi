<?php
    include 'koneksi.php';
    function tambah_data($data){

        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tgl = $data['tanggal_lahir'];
        $agama = $data['agama'];
        $telepon = $data['telepon'];

        $query = "INSERT INTO tb_siswa (nama, tempat, tanggal_lahir, agama, telepon) VALUES ('$nama', '$tempat', '$tgl', '$agama', '$telepon')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){

        $id_siswa = $data['id_siswa'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tgl = $data['tanggal_lahir'];
        $agama = $data['agama'];
        $telepon = $data['telepon'];

        $query = "UPDATE tb_siswa SET id_siswa='$id_siswa', nama= '$nama', tempat= '$tempat', tanggal_lahir= '$tgl', agama= '$agama', telepon= '$telepon' WHERE id_siswa='$id_siswa';"; 

        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){

        $id_siswa = $data['hapus'];
        $query = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;

    }

?>