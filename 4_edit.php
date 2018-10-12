<?php
	session_start();
	include "koneksi.php";
	$nim = $_SESSION['NIM'];

   	$sql = mysqli_query($con, "SELECT * FROM mahasiswa WHERE NIM = '$nim'");
	$preview = mysqli_fetch_row($sql);
	
?>
<html>
<body>
	<form method="post">
		<table>
			<tr>
				<td>NIM</td><td>:</td>
				<td><input type="text" name="nim" value="<?php echo $preview['0'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td><td>:</td>
				<td><input type="text" name="nama" value="<?php echo $preview['1'] ?>"></td>
			</tr>
			<tr>
				<td>Kelas</td><td>:</td>
				<td>
					<select name="kelas">
						<option value="41-01">41-01</option>
						<option value="41-02">41-02</option>
						<option value="41-03">41-03</option>
						<option value="41-04">41-04</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td><td>:</td>

				<td>
					
					<input type="radio" name="jk" value="L" <?php echo ($preview['3']=='L')?'checked':'' ?>>L
					<input type="radio" name="jk" value="P" <?php echo ($preview['3']=='P')?'checked':'' ?>>P
				</td>
			</tr>
			<tr>
				<td>Hobi</td><td>:</td>
				<?php $hobii = explode(',',$preview['4']); //print_r($hobii);?>
				<td><strong>
       
				<td><input type="checkbox" name="hobi[]" value="Membaca"  <?php if(in_array('Membaca',$hobii)){echo "checked=checked";}?>>Membaca 
					<input type="checkbox" name="hobi[]" value="Menulis" <?php if(in_array('Menulis',$hobii)){echo "checked=checked";}?>>Menulis
					<input type="checkbox" name="hobi[]" value="Makan" <?php if(in_array('Makan',$hobii)){echo "checked=checked";}?>>Makan 
				</td>
			</tr>
			<tr>
				<td>Fakultas</td><td>:</td>
				<td>
					<select name="fakultas">
						<option value="FTE">FTE</option>
						<option value="FKB">FKB</option>
						<option value="FIT">FIT</option>\
					</select>
				</td>
			</tr>
			<tr>
				<td>Alamat</td><td>:</td>
				<td><textarea name="alamat" ><?php echo $preview['6'] ?></textarea></td>
			</tr>
		</table>
		<input type="submit" name="edit" value="EDIT"><br>
		
	</form>
</body>
</html>
<?php
if(isset($_POST['edit'])){
	$nim 		= $_POST['nim'];
	$len_nim	= strlen($nim);
	$nama 		= $_POST['nama'];
	$len_nama	= strlen($nama);
	$kelas 		= $_POST['kelas'];
	$jk			= $_POST['jk'];
	$hobi 		= $_POST['hobi'];
	$hobii		= implode(',', $hobi);
	//echo $hobii;
	$fakultas 	= $_POST['fakultas'];
	$alamat 	= $_POST['alamat'];
	$cek = true;

	if(empty($nim)){
		echo "NIM Tidak Boleh KOSONG! <br>";
		$cek = false;
	}else{
		if($len_nim!=10){
			echo "NIM harus 10 Karakter! <br>";
			$cek = false;
		}else{
			if(!is_numeric($nim)){
				echo "NIM harus angka! <br>";
				$cek = false;
			}
		}
	}

	if(empty($nama)){
		echo "Nama Tidak Boleh KOSONG! <br>";
		$cek = false;
	}else{
		if($len_nama>35){
			echo "Nama maksimal 35 Karakter! <br>";
			$cek = false;
		}else{
			if(is_numeric($nama)){
				echo "Nama tidak boleh angka! <br>";
				$cek = false;
			}
		}
	}

	if($cek==true){
			 $query = "UPDATE mahasiswa SET Nama = '$nama',Kelas = '$kelas',Jk = '$jk',Hobi = '$hobii',Fakultas = '$fakultas',Alamat = '$alamat' WHERE NIM = '$nim'";
			  if(mysqli_query($con,$query)){
			   	header("location:3_tampil.php");
			   	echo "Berhasil di ubah";
				    $con->close();
			  }else{
			   echo "gagal";
			  }
	}else{
		echo "data gagal diedit";
	}

	
}

?>
