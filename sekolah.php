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

// Validasi session sudah ada
if (!isset($_SESSION['idprodi'])) {
    echo "Silakan pilih prodi terlebih dahulu.";
    exit;
}

$idprodi = $_SESSION['idprodi'];
?>
<body>
    <div class="sekolah">
        <p style="padding-bottom:10px;font-weight:bold">Asal Sekolah</p>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">

            <div class="daftar">
                <label style="margin-right:121px;">Provinsi</label>
                : <input name="prov" type="text" id="prov" placeholder="provinsi">
            </div>
            <div class="daftar">
                <label style="margin-right:109px;">Kab./Kota</label>
                : <input name="kab" type="text" id="kab" placeholder="kabupaten/kota">
            </div>
            <div class="daftar">
                <label style="margin-right:84px;">Jenis Sekolah</label>
                : <input name="jenis_sekolah" type="text" id="jenis_sekolah" placeholder="jenis sekolah">
            </div>
            <div class="daftar">
                <label style="margin-right:124px;">Jurusan</label>
                : <input name="jurusan" type="text" id="jurusan" placeholder="jurusan">
            </div>
            <div class="daftar">
                <label style="margin-right:77px;">Nama Sekolah</label>
                :<input name="nama_sekolah" type="text" id="nama_sekolah" placeholder="nama sekolah">
            </div>
            <div class="daftar">
                <label style="margin-right:112px;">Foto 3x4</label>    
                : <input name="past_foto" type="file" id="past_foto">
            </div>
            <input class="tombol" name="simpan" type="submit" id="simpan" value="Selanjutnya">
        </form>
    </div>

<?php
if (isset($_POST["simpan"])) {
    if (!empty($_POST["prov"]) and !empty($_POST["kab"]) and !empty($_POST["jenis_sekolah"]) 
        and !empty($_POST["jurusan"]) and !empty($_POST["nama_sekolah"])) {
        
        $nmpast_foto = $_FILES["past_foto"]["name"];
        $lokpast_foto = $_FILES["past_foto"]["tmp_name"];
        
        if (!empty($lokpast_foto)) {
            move_uploaded_file($lokpast_foto, "../past_foto/$nmpast_foto");
        }
        
        $sqlf = mysqli_query($kon, "INSERT INTO sekolah 
            (idsiswa, prov, kab, jenis_sekolah, jurusan, nama_sekolah, past_foto) 
            VALUES 
            ('$rsis[idsiswa]', '{$_POST['prov']}', '{$_POST['kab']}', 
            '{$_POST['jenis_sekolah']}', '{$_POST['jurusan']}', '{$_POST['nama_sekolah']}', '$nmpast_foto')");

        if ($sqlf) {
            echo "Data Berhasil Disimpan";
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=biodata'>";
        } else {
            echo "Gagal Menyimpan: " . mysqli_error($kon);
        }
    } else {
        echo "Isi Data dengan Lengkap";
    }
}
?>
</body>