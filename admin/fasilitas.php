<style>
    img{
        width:6pc;
        height:7pc;
    }
    .dh4{
        width: 33pc;
        height:40pc:
    }
</style>
<body>
<div class="content">
		<div class="jarak">
					<div class="jarak">
<button type="button" class="btn btn-dis">Fasilitas</button> &raquo;
<a href="<?php echo "?p=fasilitasadd"; ?>"><button type="button" class="btn btn-add">Tambah Fasilitas</button></a>
<br>
<?php
$sqlf = mysqli_query($kon, "select * from fasilitas order by namafas asc");
while ($rf = mysqli_fetch_array($sqlf)) {
    echo "<div class='dh4'>";
    echo "<div class='card'>";
    echo "<div class='isicard'>";
    echo "<br>";
    echo "<big>$rf[namafas]</big>
     <hr><small style='font-size:15px;'>$rf[ketfas]</small>
     <hr><img style='margin-left:20px;margin-top:20px;margin-bottom:20px;' src='../fotofasilitas/$rf[foto1]' border='1' '>
     <img style='margin-left:20px;margin-bottom:20px;margin-top:20px;' src='../fotofasilitas/$rf[foto2]' border='1''>
     <hr><small><i>Dibuat pada</i> $rf[tglfas] WIB
     <br> Oleh $ra[nama]</i></small>";
    echo "</div>";
    echo "<div class ='kakicard'>";
    echo "<br><a href='?p=fasilitasedit&id=$rf[idfas]'><button type='button' class='btn btn-add'>Ubah</button></a> ";
    echo "<a href='?p=fasilitasdel&id=$rf[idfas]'><button type='button' class='btn btn-add'>Hapus</button></a>";
    echo "</div>";
    echo "</div><br>";
    echo "</div>";
}
?>
						<br>
				</div>
			</div>
		</div>
        </body>