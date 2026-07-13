<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "koneksi.php";
$sqlsis = mysqli_query($kon, "select * from siswa where username='$_SESSION[username]' and pass='$_SESSION[pass]'");
    $rsis = mysqli_fetch_array($sqlsis);

// SET SESSION idprodi dari parameter GET (nama parameter: idp)
if (isset($_GET['idp'])) {
    $_SESSION['idprodi'] = $_GET['idp'];
}

$idprodi = $_SESSION['idprodi'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asal Sekolah</title>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="biodata">
        <p style="padding-bottom:10px;font-weight:bold">Biodata Lengkap</p>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
        <div class="daftar"><label style="margin-right:121px;">Nama Lengkap</label>
            : <input name="nama_lengkap" type="text" id="nama_lengkap" placeholder="nama lengkap"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:70px;">Tempat/Tanggal Lahir</label>
            : <input style="width:520px;" name="tmp_lahir" type="text" id="tmp_lahir" placeholder="tempat lahir">
            <input style="width:400px;" name="tanggal" type="date" id="tanggal"></br></br></br>
        </div>
<label style="margin-right:124px;">Jenis Kelamin</label>
            : <input name="jk" type="radio" value="L" />
            Laki-Laki 
            <input name="jk" type="radio" value="P" />
            Perempuan<br><br>

        <div class="daftar"><label style="margin-right:183px;">Agama</label>
        : <input name="agama" type="text" id="agama" placeholder="agama"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:140px;">Provinsi Asal</label>
            : <input name="prov_asal" type="text" id="prov_asal" placeholder="provinsi asal"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:120px;">Kabupaten Asal</label>
            :<input name="kab_asal" type="text" id="kab_asal" placeholder="kabupaten asal"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:115px;">Alamat Lengkap</label>
            :<input name="almt_lengkap" type="text" id="almt_lengkap" placeholder="alamat lengkap"></br></br>
        </div>
        
       <input class="tombol" name="kembali" type="submit" id="kembali" value="Kembali">
        <input class="tombol" name="simpan" type="submit" id="simpan" value="Selanjutnya">
    </div>
</form>
<?php
        if (isset($_POST["simpan"])) {
                                    $sqlb = mysqli_query($kon,"insert into biodata (idbiodata, idsiswa, nama_lengkap, tmp_lahir, tanggal, jk, agama, prov_asal, kab_asal, almt_lengkap) values ('$rb[idbiodata]','$rsis[idsiswa]', '$_POST[nama_lengkap]','$_POST[tmp_lahir]', '$_POST[tanggal]', '$_POST[jk]', '$_POST[agama]', '$_POST[prov_asal]', '$_POST[kab_asal]', '$_POST[almt_lengkap]')");
        
                if($sqlb){
                    echo "Data Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=nilai'>";
        }
        if (isset($_POST["kembali"])) {
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=sekolah'>";
        }

        ?>
</body>
</html>