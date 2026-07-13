<?php
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
 include "koneksi.php";
$sqlsis = mysqli_query($kon, "select * from siswa where username='$_SESSION[username]' and pass='$_SESSION[pass]'");
    $rsis = mysqli_fetch_array($sqlsis);

$idprodi = $_SESSION['idprodi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
</head>
<body>

    <div class="sekolah">
        <p style="padding-bottom:10px;font-weight:bold">Nilai</p>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <form action="" method="GET">
        <input name="iddaftar" type="hidden" value="<?php echo "$rd[iddaftar]"; ?>">
        <div class="daftar"><label style="margin-right:64px;">Bahasa Indonesia</label>
            : <input name="bindo" type="text" id="bindo" placeholder="nilai rata-rata bahasa indonesia"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:102px;">Matematika</label>
            : <input name="mtk" type="text" id="mtk" placeholder="nilai rata-rata matematika"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:84px;">Bahasa Inggris</label>
            : <input name="bing" type="text" id="bing" placeholder="nilai rata-rata bahasa inggris"></br></br>
        </div>
        <div class="daftar"><label style="margin-right:79px;">Foto SKL/Ijazah</label>
            : <input name="fotoskl" type="file" id="fotoskl">
        </div></br>
    </div>
        <input class="tombol" name="kembali" type="submit" id="kembali" value="Kembali">
        <input class="tombol" name="simpan" type="submit" id="simpan" value="Selanjutnya">
    </div>
    </form>
</form>
<?php
        if (isset($_POST["simpan"])) {
            if(!empty($_POST["bindo"]) and !empty($_POST["mtk"]) and !empty($_POST["bing"])){
            $nmfotoskl = $_FILES["fotoskl"]["name"];
                $lokfotoskl = $_FILES["fotoskl"]["tmp_name"];
                if(!empty($lokfotoskl)){
                    move_uploaded_file($lokfotoskl, "../fotoskl/$nmfotoskl");
                }
                          $sqln = mysqli_query($kon,"insert into nilai (idsiswa, idprodi, bindo, mtk, bing, fotoskl) values ('$rsis[idsiswa]', '$idprodi', '$_POST[bindo]','$_POST[mtk]', '$_POST[bing]', '$nmfotoskl')");
        
                if($sqln){
                    echo "Data Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=konfirmasi'>";
            } else {
                echo "Isi Data dengan Lengkap";
            }
        }
            if (isset($_POST["kembali"])) {
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=biodata'>";
            }
        ?>
</body>
</html>