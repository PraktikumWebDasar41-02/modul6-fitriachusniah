<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman ";
		}
	}
?>
<html>
<head><title>Jurnal 6 FitriaRC-6701171069</title></head>
<body >
	<br><br><br><br><br><br>
	<center>
		<table style="border: solid thin #666; height: 250px; width: 300px;">
			<form action="proseslogin.php" method="post">
				<tr>
					<td colspan="2">
						<center>LOGIN</center>
					</td>
				</tr>
				<tr>
					<td>&nbspNIM</td>
					<td><input type="text" name="nim"></td>
				</tr>
				<tr>
					<td>&nbspNama Lengkap</td>
					<td><input type="text" name="nama" ></td>
				</tr>
				<tr>
					<td colspan="2"><br><center><input type="submit" name="submit" value="LogIn"></center></td>
				</tr>
				<tr>
					<td colspan="2"><font style="text-align: right;"><a href="1_formregister.php">SIGN UP</a></font></td>
				</tr>
		    </form>
		</table>
	</center>
</body>
</html>