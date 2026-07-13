<div class ="card">
    <div class="kepalacard">Konfirmasi Pembayaran</div>
    <div class="isicard" style="text-align:center">
    <form method="get" action="" enctype="multipart/form-data">
        <div class="dh12">
            <input type="hidden" name="p" value="<?php echo "$_GET[p]"; ?>">
            <input type="hidden" name="idsekolah" value="<?php echo "$_GET[idsekolah]"; ?>">
            <input type="text" name="nodaftar" placeholder="Masukkan No Order(Tanpa #)" value="<?php echo "$_GET[nodaftar]"; ?>">
            <br><input type="submit" value="Cari No. Order">
</div>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "koneksi.php";

$result = null;
if (isset($_GET['nodaftar']) && !empty($_GET['nodaftar'])) {
    $nodaftar = mysqli_real_escape_string($kon, $_GET['nodaftar']);
    $sql = "SELECT * FROM siswa
            INNER JOIN daftar ON siswa.idsiswa = daftar.idsiswa
            LEFT JOIN biodata ON siswa.idsiswa = biodata.idsiswa
            LEFT JOIN sekolah ON siswa.idsiswa = sekolah.idsiswa
            LEFT JOIN nilai ON siswa.idsiswa = nilai.idsiswa
            WHERE daftar.nodaftar = '$nodaftar'";
    $result = mysqli_query($kon, $sql);

    if (!$result) {
        die("Query Error: " . mysqli_error($kon));
    }
}
?>

    <label>Provinsi :</label>
    <input name="nama" type="text" value="<?php echo "$row[prov]"; ?>"></br>
    <label>Kab/Kota :</label>
    <input name="nama" type="text" value="<?php echo "$row[kab]"; ?>"></br>
    <label>Asal Sekolah :</label>
    <input name="nama" type="text" value="<?php echo "$row[asal_sekolah]"; ?>"></br>
    <label>Jurusan :</label>
    <input name="nama" type="text" value="<?php echo "$row[jurusan]"; ?>"></br>

    <h2>Data Pribadi</h2>
    <label>Nama Lengkap :</label>
    <input name="nama" type="text" value="<?php echo "$row[nama_lengkap]"; ?>"></br>
    <label>Tempat/Tgl Lahir :</label>
    <input name="nama" type="text" value="<?php echo "$row[tmp_lahir];$rb[tanggal]"; ?>"></br>
    <label>Jenis Kelamin :</label>
    <input name="nama" type="text" value="<?php echo "$row[jk]"; ?>"></br>
    <label>Agama :</label>
    <input name="nama" type="text" value="<?php echo "$row[agama]"; ?>"></br>
    <label>Provinsi Asal :</label>
    <input name="nama" type="text" value="<?php echo "$row[prov_asal]"; ?>"></br>
    <label>Kab/Kota Asal :</label>
    <input name="nama" type="text" value="<?php echo "$row[kab_asal]"; ?>"></br>
    <label>Alamat Lengkap :</label>
    <input name="nama" type="text" value="<?php echo "$row[almt_lengkap]"; ?>"></br>
   
    <h2>Data Nilai</h2>
    <label>Nilai Rata-rata Bahasa Indonesia :</label>
    <input name="nama" type="text" value="<?php echo "$row[bindo]"; ?>"></br>
    <label>Nilai Rata-rata Bahasa Matematika :</label>
    <input name="nama" type="text" value="<?php echo "$row[mtk]"; ?>"></br>
    <label>Nilai Rata-rata Bahasa Inggris :</label>
    <input name="nama" type="text" value="<?php echo "$row[bing]"; ?>"></br>

<?php
if ($result && mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_array($result)) {
        // ... tampilkan data seperti biasa
    }
} elseif ($result) {
    echo "No. Order tidak ditemukan.";
}
?>

</div>
    <input class="tombol" name="konfirmasi" type="submit" id="konfirmasi" value="Selanjutnya">
</form>