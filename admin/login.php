<div class="login">
    <fieldset>
        <img src="../foto/avatar.png" width="120px">
        <form name="form1" method="post" action="">
            <h3>ADMINISTRATOR</h3>
            <p>Silahkan Login</p>
            <input name="username" type="text" id="username" placeholder="Username">
            <input name="password" type="text" id="password" placeholder="Password">
            <input name="login" type="submit" id="loginadm" value="Login Admin">
        </form>

       <?php
include 'koneksi.php';
?>

    <?php
    if (isset($_POST["login"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sqla = mysqli_query($kon, "select * from admin where username='$username' and password='$password'");
        $ra = mysqli_fetch_array($sqla);
        $row = mysqli_num_rows($sqla);

        if ($row > 0) {
            // TIDAK perlu session_start() lagi di sini
            // karena sudah dipanggil di index.php
            $_SESSION["useradm"] = $ra["username"];
            $_SESSION["passadm"] = $ra["password"];
            echo "<div align='center'> Login Berhasil</div>";
        } else {
            echo "<div align='center'> Login Gagal</div>";
        }
        echo "<META HTTP-EQUIV='Refresh' content='1; URL=?p=beranda'>";
    }
    ?>
</section>
    </fieldset>
</div>