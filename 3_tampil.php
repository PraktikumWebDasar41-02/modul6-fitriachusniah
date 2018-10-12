<?php
session_start();
include "koneksi.php";
$nim =  $_SESSION['NIM'];

 $sql = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
      
        while($row = $result->fetch_assoc()) {
        
            echo "<br> NIM: ". $row["NIM"]. 
            	 " <br> Nama: ". $row["Nama"].
            	 " <br> Kelas: ". $row["Kelas"].
            	 " <br> Jk: ". $row["Jk"].
            	 " <br> Hobi: ". $row["Hobi"].
            	 " <br> Fakultas: ". $row["Fakultas"].
            	 " <br> Alamat: ". $row["Alamat"];

            	 echo "<br><a href='4_edit.php?id=".$row['NIM']."'>Edit</a>";
            
        }
    } else {
        echo "0 results";
    }
    $con->close();
?>