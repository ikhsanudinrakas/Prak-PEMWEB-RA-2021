<?php 

	require 'fungsi.php';

	//koneksi database
	$koneksi = mysqli_connect("localhost", "root", "", 'daftarbelanja');

	//cek tombol submit
	if(isset($_POST["submit"])){

		//cek data berhasil di kirim
		if ( tambah($_POST) > 0 ) {
			echo "
				<script>
					alert('Berhasil');
					document.location.href = 'index.php';
				</script>
			";
		}
		else{
			echo "
				<script>
					alert('Gagal');
					document.location.href = 'index.php';
				</script>
			";
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TAMBAH DATA</title>
</head>
<body>

	<h1>Tambah Belanjaan</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama : </label><input type="text" name="nama" id="nama" required>
			</li>

			<li>
				<label for="jumlah">jumlah : </label><input type="int" name="jumlah" id="jumlah" required>
			</li>

			<li>
				<label for="harga">harga : </label><input type="int" name="harga" id="harga" required>
			</li>

			<li>
				<label for="gambar">Gambar : </label><input type="file" name="gambar" id="gambar">
			</li>

			
			<button type="submit" name="submit">Kirim</button>
			

		</ul>

	</form>


</body>
</html>