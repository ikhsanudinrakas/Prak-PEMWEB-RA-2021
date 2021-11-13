<?php
include "koneksi.php";
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$prodi = $_POST["prodi"];
$angkatan = $_POST["angkatan"];

$hasil = mysqli_query($kon,"UPDATE datamahasiswa SET nim='$nim', nama='$nama', angkatan='$angkatan', prodi='$prodi' where nim='$_GET[nim]'");
if ($hasil) {
echo "<script>alert('data berhasil disimpan');
document.location.href='tampil.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='tampil.php'</script>\n";
}
?>