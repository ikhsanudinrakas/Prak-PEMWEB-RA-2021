<?php
include "koneksi.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$prodi = $_POST["prodi"];
$angkatan = $_POST["angkatan"];

$sql = "insert into datamahasiswa (nim,nama,prodi,angkatan) values('$nim','$nama','$prodi','$angkatan')";
$hasil = mysqli_query($kon,$sql);

if ($hasil) {
echo "<script>alert('data berhasil disimpan');
document.location.href='tampil.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan')";
}
?>