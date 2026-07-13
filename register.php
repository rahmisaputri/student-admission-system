<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <section class="container">
      <h2 style="text-align:center;color:#FFA500;">Registration Form</h2>
      <form action="" class="form" method="post" id="form1">
      <div class="input-box">
          <label>Username</label>
          <input type="text" id="username" name="username" placeholder="enter username" required />
      </div></br>
      <div class="pass" style="margin-top:10px;">
          <label>Password</label>
          <input style="border-bottom: 1px solid black;" type="password" id="pass" name="pass" placeholder="enter password" required />
          <button type="button" onclick="togglePassword('pass')">👁</button>
        </div></br>
          <div class="pass" style="margin-top:10px;">
          <label>Confirm Password</label>
          <input style="border-bottom: 1px solid black;" type="password" id="confirm_pass" name="confirm_pass" placeholder="confirm password" required />
        <button type="button" onclick="togglePassword('confirm_pass')">👁</button>
        </div>
        <div class="button">
        <input name="register" type="submit" id="register" value="DAFTAR">
        </div>
      </form>
<script>
function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
      <?php
      if (isset($_POST["register"])) {
          if (!empty($_POST["username"]) and !empty($_POST["pass"])) {

              $username = $_POST["username"];
              $pass = $_POST["pass"];
              $confirm_pass = $_POST['confirm_pass'];

              if ($pass !== $confirm_pass) {
                  echo "Password dan konfirmasi password tidak sama.";
              } else {
                  $sqlsis = mysqli_query(
                      $kon,
                      "INSERT INTO siswa (username, pass)
                      VALUES ('$username', '$pass')"
                  );

              if ($sqlsis) {
                  echo "Data Berhasil Disimpan";
              }
              echo "<META HTTP-EQUIV='Refresh' content='1; URL=?p=login'>";
          }
      }
      }
      ?>

    </section>
  </body>
</html>