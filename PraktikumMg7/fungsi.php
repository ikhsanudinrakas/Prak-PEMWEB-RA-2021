<?php 
	
	//koneksi ke database 
	$koneksi = mysqli_connect("localhost", "root", "", "daftarbelanja");


	function query($query){
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];

		while( $row = mysqli_fetch_assoc($result) ){
			$rows[] = $row;
		}
	return $rows;
	}



	function tambah($data){
		global $koneksi;

		//ambil data dari tiap elemen dalam form
		$namabarang = htmlspecialchars($data["namabarang"]);
		$jumlah = htmlspecialchars($data["jumlah"]);
		$harga = htmlspecialchars($data["harga"]);

		// upload gambar
		$gambar = upload();
		if( !$gambar ){
			return false;
		}

		//query insert data
		$query = "INSERT INTO tabelbelanja VALUES ('','$namabarang','$gambar', '$jumlah', '$harga')";
		mysqli_query($koneksi,$query);

	return mysqli_affected_rows($koneksi);
	}



	function upload(){
		$namabarangFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		//cek apakah tidak ada gambar diupload
		if( $error === 3 ){
			echo "<script>
					alert('pilih gambar dahulu');
				</script>";

			return false;
		}


		//cek apakah yg diupload gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'pdf','jfif'];
		$ekstensiGambar = explode('.', $namabarangFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));

		if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
			echo "<script>
					alert('Yang diupload harus gambar/pdf');
				</script>";

			return false;
		}


		//cek ukuran filenya kalau terlalu besar
		if($ukuranFile > 1000000){
			echo "<script>
					alert('Ukuran gambar terlalu besar');
				</script>";
		}



		//lolos pengecekan
		//generate namabarang gambar biar tidak sama
		$namabarangFileBaru = uniqid();
		$namabarangFileBaru .= '.';
		$namabarangFileBaru .= $ekstensiGambar;


		move_uploaded_file($tmpName, 'img/' . $namabarangFileBaru);

		return $namabarangFileBaru;
	}



	function hapus($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM tabelbelanja WHERE id = $id");

	return mysqli_affected_rows($koneksi);
	}




	function ubah($data){
		global $koneksi;
		$id = $data["id"];
		$namabarang = htmlspecialchars($data["namabarang"]);
		$jumlah = htmlspecialchars($data["jumlah"]);
		$harga = htmlspecialchars($data["harga"]);
		$gambarlama = htmlspecialchars($data["gambarlama"]);


		//cek apakah user pilih gambar baru
		if( $_FILES['gambar']['error'] === 3 ){
			$gambar = $gambarlama;
		}
		else{
			$gambar = upload();
		}

		//query update data
		$query = "UPDATE tabelbelanja SET
					namabarang = '$namabarang',
					jumlah = '$jumlah',
					harga = '$harga',
					gambar = '$gambar'

					WHERE id = $id
					";

		mysqli_query($koneksi,$query);

	return mysqli_affected_rows($koneksi);
	}



	function cari($keyword){
		$query = "SELECT * FROM tabelbelanja WHERE 
					namabarang LIKE '%$keyword%' OR 
					jumlah LIKE '%$keyword%' OR
					harga LIKE '%$keyword%'
					";

	return query($query);
	}

?>