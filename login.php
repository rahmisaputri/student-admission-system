<section class="container">
        <form name="form1" method="post" action="">
            <h2 style="text-align:center;color:#FFA500;">Form Login Siswa</h2>
            <p style="text-align:center;color:#444;">Silahkan Login</p>
            <div class="user">
          <label>Username</label></br>
          <input type="text" id="username" name="username" placeholder="enter username" required />
      </div></br>
            <div class="pass" style="margin-top:10px;">
                <label>Password</label></br>
                <input style="border-bottom: 1px solid black;" name="pass" type="text" id="pass" placeholder="Password"></br>
            </div>
            <div class="button">
                <input name="login" type="submit" id="login" value="Login">
                </div>
            
            <div class="signup">
              Do you have an account? <a href="?p=register">Sign In</a>
             </div>
            </form>
<?php
include 'koneksi.php';

?>
            <?php
    if (isset($_POST["login"])) {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $sqlsis = mysqli_query($kon, "select * from siswa where username='$username' and pass='$pass'");
        $rsis = mysqli_fetch_array($sqlsis);
        $row = mysqli_num_rows($sqlsis);

        if ($row > 0) {
            // TIDAK perlu session_start() lagi di sini
            // karena sudah dipanggil di index.php
            $_SESSION["username"] = $rsis["username"];
            $_SESSION["pass"] = $rsis["pass"];
            echo "<div align='center'> Login Berhasil</div>";
            echo "<META HTTP-EQUIV='Refresh' content='1; URL=?p=beranda'>";
        } else {
            echo "<div align='center'> Login Gagal</div>";
        }

    }
    ?>

    </section>