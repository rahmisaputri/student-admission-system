<?php
    session_start();
    include "koneksi.php";

    $sqlsis = @mysqli_query($kon, "select * from siswa order by idsiswa");
    $rsis = $sqlsis ? @mysqli_fetch_array($sqlsis) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Universitas Gunadarma</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    <script type="text/javascript" src="jquery.js"></script>
    
    <style>
        body {
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            /* Memberikan ruang aman di bawah khusus untuk footer yang fixed */
            padding-bottom: 60px !important; 
        }

        /* BANNER ATAS: Berada di tengah halaman sebelum di-scroll */
        .banner-header {
            background-color: #FFA500;
            padding: 15px;
            text-align: center;
            border-bottom: 2px solid #e69500;
        }
        .banner-header h1 { margin: 0; font-size: 28px; color: #333; }
        .banner-header h3 { margin: 5px 0 0 0; font-size: 14px; color: #444; }

        /* MENU NAVIGASI: Otomatis mengunci di atas saat menyentuh batas layar (Sticky) */
        .sticky-navbar {
            position: -webkit-sticky; /* Dukungan untuk browser Safari */
            position: sticky;
            top: 0;          /* Kunci tepat di paling atas layar */
            background-color: #333; /* Warna gelap agar kontras dengan menu putih */
            z-index: 1000;   /* Melayang di atas konten lain saat di-scroll */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            padding: 0 10px;
        }

        /* KONTEN UTAMA: Diberi jarak yang pas */
        .content {
            width: 95%;
            margin: 20px auto;
            color: #333;
        }

        /* FOOTER FIXED: Tetap mengunci di bagian paling bawah */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }
        footer {
            background-color: #FFA500;
            padding: 20px;
            border-top: 1px solid #f0f0f0;
            font-size: 14px;
			bottom: 0;
        }
    </style>
</head>
<body>

    <div class="banner-header">
        <h1 class="judul">Universitas GunaDarma</h1>
        <h3 class="deskripsi">Selamat Datang Di Website Penerimaan Mahasiswa Baru</h3>
    </div>

    <div class="sticky-navbar">
        <div class="menu">
            <nav role="navigation" class="primary-navigation">
              <ul>
                <li><a href="?p=beranda">Beranda</a></li>
                <li><a href="#">Profil &dtrif;</a>
                  <ul class="dropdown">
                    <li><a href="?p=profil">Profil</a></li>
                    <li><a href="?p=fasilitas">Fasilitas</a></li>
                  </ul>
                </li>
                <li><a href="#">Persyaratan &dtrif;</a>
                  <ul class="dropdown">
                    <li><a href="?p=persyaratan">Persyaratan</a></li>
                    <li><a href="?p=biaya">Biaya Kuliah</a></li>
                  </ul>
                </li>
                
                <?php if (isset($_SESSION['username'])): ?>
                <li style="float:right;">
                    <a href="#">Hi <?= htmlspecialchars($_SESSION['username']) ?> ▾</a>
                    <ul class="dropdown">
                        <li><a href="?p=logout">Logout</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li style="float:right;">
                    <a href="#">Login &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="?p=login">Login</a></li>
                        <li><a href="?p=logout">Logout</a></li>
                    </ul>
                </li>
                <?php endif; ?>
              </ul>
            </nav>
        </div>
    </div>

    <!-- 3. Konten Utama (Akan masuk ke bawah menu navigasi saat di-scroll) -->
    <div class="content">
        <?php
            $page = isset($_GET["p"]) ? $_GET["p"] : "beranda";

            if ($page == "logout") { include "logout.php"; } 
            else if ($page == "profil") { include "profil.php"; }
            else if ($page == "fasilitas") { include "fasilitas.php"; }
            else if ($page == "biaya") { include "biaya.php"; } 
            else if ($page == "sekolah") { include "sekolah.php"; } 
            else if ($page == "biodata") { include "biodata.php"; } 
            else if ($page == "nilai") { include "nilai.php"; }
            else if ($page == "prodidetail") { include "prodidetail.php"; } 
            else if ($page == "register") { include "register.php"; }  
            else if ($page == "persyaratan") { include "persyaratan.php"; }
            else if ($page == "konfirmasi") { include "konfirmasi.php"; } 
            else if ($page == "daftar") { include "daftar.php"; } 
            else if ($page == "login") { include "login.php"; }
            else { include "beranda.php"; }
        ?>
    </div>
    
    <!-- 4. Footer Tetap di Bawah -->
    <div class="footer">
        <footer>
            <center><p style="margin:0;">Copyright Rahmi Madiah Saputri | <script>document.write(new Date().getFullYear());</script> </p></center>
        </footer>
    </div>

</body>
</html>
