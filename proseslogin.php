<?php 

    session_start();
     
     include 'koneksi.php';
     

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $data = mysqli_query($con ,"select * from mahasiswa where NIM='$nim' and Nama='$nama'");
     
    $cek = mysqli_num_rows($data);
    if($cek > 0){
      $row_akun = mysqli_fetch_row($data);
      $_SESSION['NIM'] = $row_akun['0'];
      $_SESSION['Nama'] = $row_akun['1'];
      header("location:3_tampil.php");
      //echo "Hai".$_SESSION['Nama'];
    }else{
      header("location:2_formlogin.php?pesan=gagal");
    }

?>