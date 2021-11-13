<html>
<head>
    <style>
        legend{
        font-size:30pt;
        font-family: 'Courier New';
        margin: 20px 10px 20px 10px;
        color:black;
        }
        form{
        background-color: rgba(300, 190, 185, 0.898);
        color: rgb(119, 40, 29);
        font-family:'Segoe UI';
        font-size: 25px;
        text-align: center;
        width: 40%;
        margin: 150pt 400pt 50pt 300pt;
        padding: 20px;
        height:50p%;
        }
  </style>
</head>
<body>
<?php
include "koneksi.php";
?>
<form method="post" action="proses-edit.php?nim=<?php echo $_GET['nim'];?>" >
<legend><b>*Silahkan edit*</b></legend>
<?php
$nim = $_GET['nim'];
$hasil=mysqli_query($kon,"select * from datamahasiswa where nim=$nim");
$data = mysqli_fetch_array($hasil);
?>
    <label>NIM </label>
    <input type="number" name="nim"><br>
    <label>Nama </label>
    <input type="text" name="nama"><br>
    <label>Prodi </label>
    <select name="prodi">
        <option value="IF">Teknik Informatika</option>
        <option value="EL">Teknik Elektro</option>
        <option value="SI">Teknik Sipil</option>
        <option value="TG">Teknik Geofisika</option>
        <option value="MA">Matematika</option>
    </select><br>
    <label>Angkatan </label>
    <input type="number" name="angkatan"><br>
    <p> <input type="submit" name="simpan" value="simpan"></p>

</form>
</body>
</html>