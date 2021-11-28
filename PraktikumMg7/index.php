<?php  
	//koneksi ke database
	require 'fungsi.php';
	require 'bootstrap.html';
	$tabelbelanja = query("SELECT * FROM tabelbelanja ORDER BY id ASC");

	//tombol cari diklik
	if ( isset($_POST["cari"]) ) {
		$tabelbelanja = cari($_POST["keyword"]);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Minggu7</title>
</head>
<body>
	<h1>Daftar Belanja</h1>

	<a href="tambah.php">Tambah Belanjaan</a>
	<br><br>

	<form action="" method="post">
		<button type="submit" name="cari">Cari</button>
		<input type="text" name="keyword" size="30" autofocus placeholder="Searching..." autocomplete="off">

	</form>
	<br>

	<table class="table table-striped">

		<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Aksi</th>
			<th scope="col">Gambar</th>
			<th scope="col">jumlah</th>
			<th scope="col">Nama</th>
			<th scope="col">harga</th>
		</tr>
		</thead>

		<tbody>
		<?php $i = 1; ?>
		<?php foreach ( $tabelbelanja as $row ):?>

		<tr>
			<td><?= $i; ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah anda yakin akan menghapus? ')">Hapus</a>
			</td>
			<td><img src="img/<?= $row["gambar"]; ?>" width="80"></td>
			<td><?= $row["jumlah"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["harga"]; ?></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>