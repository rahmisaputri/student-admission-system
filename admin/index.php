<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator Universitas</title>
    
    <!-- 1. CSS eksternal dipanggil di sini -->
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <!-- 2. Tag style internal dipindahkan ke dalam HEAD yang benar -->
    <style>
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 999;
            height:50px;
        }
        footer {
            background-color: #FFA500;
            padding: 4px 6px;
            border-radius: 5px;
            border: 1px solid #f0f0f0;
            margin-bottom: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <?php
    // Mengamankan pengecekan session agar tidak memicu error 'Undefined index' di PHP versi baru
    $useradm = isset($_SESSION["useradm"]) ? $_SESSION["useradm"] : '';
    $passadm = isset($_SESSION["passadm"]) ? $_SESSION["passadm"] : '';

    if (!empty($useradm) && !empty($passadm)) {
        // Mengamankan query sql
        $sqla = @mysqli_query($kon, "select * from admin where username='$useradm' and password='$passadm'");
        $ra = $sqla ? @mysqli_fetch_array($sqla) : null;
    ?>

        <div class="grid">
            <div class="dh12">
                <div class="container1">
                      <a href="?p=beranda">Admin Universitas</a>
                      <div>
                <p><a href="<?php echo "?p=logout"; ?>"><button type="button" class="btn btn-add">Logout</button></a></p>
                </div>
                </div>
            </div>
        </div>

        <div class="grid">
            <div class="dh12">
                <div class="container2">
                    <?php
                    // Mengamankan parameter $_GET['p'] agar tidak error saat pertama kali dibuka
                    $page = isset($_GET["p"]) ? $_GET["p"] : "beranda";

                    if ($page == "logout") { include "logout.php"; } 
                    else if ($page == "fasilitas") { include "fasilitas.php"; } 
                    else if ($page == "fasilitasadd") { include "fasilitasadd.php"; } 
                    else if ($page == "fasilitasedit") { include "fasilitasedit.php"; } 
                    else if ($page == "fasilitasdel") { include "fasilitasdel.php"; } 
                    else if ($page == "biaya") { include "biaya.php"; } 
                    else if ($page == "biayaadd") { include "biayaadd.php"; } 
                    else if ($page == "biayaedit") { include "biayaedit.php"; } 
                    else if ($page == "prodi") { include "prodi.php"; } 
                    else if ($page == "prodiadd") { include "prodiadd.php"; } 
                    else if ($page == "prodiedit") { include "prodiedit.php"; } 
                    else if ($page == "pendaftar") { include "pendaftar.php"; } 
                    else { include "beranda.php"; }
                    ?>
                </div>
            </div>
        </div>

        <div style="margin: 10px 0;">
            <i>catatan : Untuk kembali beranda klik Admin Universitas</i>
        </div>
        <div class="footer">
            <footer>
                <center><p>Copyright Rahmi Madiah Saputri | <script>document.write(new Date().getFullYear());</script> </p></center>
            </footer>
        </div>

    <?php
    } else {
        include "login.php";
    }
    ?>
</body>
</html>
