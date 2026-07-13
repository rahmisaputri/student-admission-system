<style>

  .card {
  margin: 17px;
  min-height: 230px;
  border: thin;
  box-shadow: 2px 2px 4px 2px rgba(0, 0, 0, 0.2);
  padding-bottom: 10px;
}

.kepalacard {
  padding: 10px;
  background-color: #0b244e;
  color: #ffffff;
  font-family: Century Gothic;
  font-size: 20px;
  text-align: right;
}

.isicard {
  padding-left: 10px;
  padding-right: 10px;
  background-color: #ffffff;
  color: #0b244e;
  min-height: 185px;
  font-size: 14px;
}

.isicard select {
  width: 90%;
  padding: 0.8em;
  margin-top: 1em;
  border: 1px solid #0b244e;
  background-color: #ffffff;
  font-family: Cambria;
  font-size: 14px;
  color: #0b244e;
  text-align: center;
  border-radius: 5px;
}

.isicard hr,
.isicard img {
  border: 1px solid rgba(0, 0, 0, 0.2);
}

.isicard .badge {
  width: 35px;
  height: 23px;
  border-radius: 7px;
  float: right;
  background-color: #0b244e;
  color: #ffffff;
  text-align: center;
  font-weight: bold;
  font-size: 17px;
}

.isicard big {
  font-size: 18px;
  font-weight: bold;
}

.isicard .jmlbeli input[type="text"]{
  width: 40px;
  font-family: Cambria;
  font-size: 14px;
  font-weight: bold;
  color: #0b244e;
  padding: 0.5em;
  border:solid 1px #0b244e;
  border-radius: 5px;
  text-align: center;
}

.kakicard {
  padding-left: 10px;
  padding-right: 10px;
  background-color: #ffffff;
  color: #0b244e;
  text-align: right;
  min-height: 50px;
}
button{
	height: 40px;
	width: 30%;
	color: #444;
	font-size: 15px;
	font-weight: 400;
	margin-top: 30px;;
	border: none;
	cursor: pointer;
	transition: all 0.2s ease;
	background: #FFA500;
	border-radius: 10px;
	font-family: arvo;
	font: bold;
  }
</style>
<body>
<div class="container5">
    <div class="grid">
        <div class="dh12">
<?php
    $sqlp =mysqli_query($kon,"select * from prodi where idprodi='$_GET[idp]'");
    $rp =mysqli_fetch_array($sqlp);
        $sqlk = mysqli_query($kon,"select * from prodi where idadmin='$rp[idadmin]'");
        $rk = mysqli_fetch_array($sqlk);
        $biaya = number_format($rp["biaya"]);
        

    echo "<div class='dh12'>";
    echo "<div class='card'>";
    echo "<div class='isicard' style='text-align:center;'>";
    echo "<br>";
    echo "
          <big>$rp[nama_prodi]</big>
          <hr>
          <b>IDR $biaya</b> 
         
          <hr>
          <b>Detail</b><br> <br>$rp[detail]
          <hr>
          
          <small><i?>Dibuat pada $rp[tglinput] WIB</i></small>";
    echo "</div>";
    echo "<div class='kakicard'>";
  if (isset($_SESSION['username'])) {
      $href = "?p=sekolah&idp={$rp['idprodi']}&idsiswa={$rsis['idsiswa']}";
  } else {
      $href = "?p=login";
  }

  echo '<a href="'.$href.'"><button type="button">Daftar Sekarang</button></a>';
    echo "</div><br>";
    echo "</div>";
?>
        </div>
    </div>
    </div>
    </div> 
</body>    