<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "koneksi.php";
$no = 1;

// Memperbaiki ON clause pada LEFT JOIN agar tidak terjadi crash database
$sql = "SELECT * FROM siswa 
        INNER JOIN daftar ON siswa.idsiswa = daftar.idsiswa 
        LEFT JOIN biodata ON biodata.idsiswa = biodata.idsiswa 
        LEFT JOIN sekolah ON sekolah.idsiswa = sekolah.idsiswa 
        LEFT JOIN nilai ON nilai.idsiswa = nilai.idsiswa";
$result = mysqli_query($kon, $sql);
?>

<div class="content">

    <h2 style="text-align:center; font-size:30px;">Data Pendaftar</h2>
    
    <div class="jarak">
        <div class="card" style="padding: 10px;">
            
            <table style="margin-top:20px; margin-bottom:20px; width: 100%; border-collapse: collapse;">
                <thead class="judul">
                    <tr>
                        <th style="background-color:#FFD700; padding: 10px;text-align: center;">No</th>
                        <th style="background-color:#FFD700; padding: 10px; text-align: center;">Kode Pendaftaran</th>
                        <th style="background-color:#FFD700; padding: 10px; text-align: center;">Biodata</th>
                        <th style="background-color:#FFD700; padding: 10px; text-align: center;">Data Sekolah</th>
                        <th style="background-color:#FFD700; padding: 10px; text-align: center;">Nilai Pendaftar</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                if($result && mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_array($result)) {
                ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px; text-align: center; vertical-align: top;">
                            <?php echo $no++; ?>
                        </td>
                        <td style="width:12pc; padding: 10px; vertical-align: top;">
                            <strong>Kode Pendaftar :</strong><br/>
                            <?php echo isset($row['nodaftar']) ? $row['nodaftar'] : '-'; ?><br/>
                            <strong>Tanggal Daftar :</strong><br/>
                            <?php echo isset($row['tgldaftar']) ? $row['tgldaftar'] : '-'; ?><br/>
                        </td>
                        <td style="width:22pc; padding: 10px; vertical-align: top;">
                            <strong>Nama Lengkap :</strong> <?php echo isset($row['nama_lengkap']) ? $row['nama_lengkap'] : '-'; ?><br/>
                            <strong>Tempat/Tgl Lahir :</strong> <?php echo (isset($row['tmp_lahir']) ? $row['tmp_lahir'] : '-') . ", " . (isset($row['tanggal']) ? $row['tanggal'] : '-'); ?><br/>
                            <strong>Jenis Kelamin :</strong> <?php echo isset($row['jk']) ? $row['jk'] : '-'; ?><br/>
                            <strong>Alamat Lengkap :</strong> <?php echo isset($row['almt_lengkap']) ? $row['almt_lengkap'] : '-'; ?><br/>
                        </td>
                        <td style="width:13pc; padding: 10px; vertical-align: top;">
                            <strong>Asal Sekolah :</strong> <?php echo isset($row['nama_sekolah']) ? $row['nama_sekolah'] : '-'; ?><br/>
                            <strong>Jurusan :</strong> <?php echo isset($row['jurusan']) ? $row['jurusan'] : '-'; ?><br/>
                        </td>
                        <td style="width:20pc; padding: 10px; vertical-align: top;">
                            <strong>Bahasa Indonesia :</strong> <?php echo isset($row['bindo']) ? $row['bindo'] : '0'; ?><br/>
                            <strong>Matematika :</strong> <?php echo isset($row['mtk']) ? $row['mtk'] : '0'; ?><br/>
                            <strong>Bahasa Inggris :</strong> <?php echo isset($row['bing']) ? $row['bing'] : '0'; ?><br/>
                        </td>
                    </tr>
                <?php
                    } // Penutup while
                } else {
                ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 20px; color: red;">
                            Belum ada data pendaftar yang tersimpan.
                        </td>
                    </tr>
                <?php
                }
                ?>
                
                </tbody>
            </table> <!-- PENUTUP TABEL DI LUAR LOOP -->
            
        </div>
    </div>
</div>
