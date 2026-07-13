<style>
    .konfir{
        text-align:center;
        border: 2px solid #FFA500;
	width: 80%;
	margin-top: 30px;
	margin-bottom: 20px;
	border-radius: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	margin-left: 10%;
	padding-left: 30px;
    }
</style>
<div class="konfir">
<?php
$tgl = date("d");
$bln = date("m");
$thn = date("Y");
$jam = date("H");
$mnt = date("i");
$dtk = date("s");
 
mysqli_query($kon, "insert into daftar (nodaftar, idsiswa,tgldaftar) values ('$thn$bln$tgl$jam$mnt$dtk','$rsis[idsiswa]', NOW())");

//Mendapatkan ID Order
$iddaftar = mysqli_insert_id($kon);

    echo"<h3>Konfirmasi Pendaftaran</h3>";
    echo"<p>Berikut Kode Pendaftaran</p>";
echo "<h2 style='color:#FFA500;'><b>$thn$bln$tgl$jam$mnt$dtk</b></h2>";
echo"<p>Selamat kamu sudah selesai melalukan pendaftaran,</br> Silahkan cetak dan bawa bukti pendaftaran saat melakukan ujian secara luring</p>";
?>

</div>
<div align="right"><a href="javascript:window.print()"><button type="button" class="btn btn-add">CetakFaktur</button></a></div>
</div>