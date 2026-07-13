<div class="content">
		<div class="jarak">
				<div class="border">
					<div class="jarak">
<?php
$sqlf = mysqli_query($kon, "SELECT * FROM fasilitas WHERE idfas='$_GET[id]'");
$rf = mysqli_fetch_array($sqlf);
?>

<a href="<?php echo "?p=fasilitas"; ?>"><button type="button" class="btn btn-add">Fasilitas</button></a>
<button type="button" class="btn btn-dia">Ubah</button>
<br>

<div class="card">
    <div class="kepalacard">Ubah Fasilitas</div>
    <div class="isicard" style="text-align:center;">
        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="idfas" value="<?php echo $rf['idfas']; ?>">
            <input name="namafas" type="text" id="namafas" placeholder="Nama Fasilitas" value="<?php echo $rf['namafas']; ?>">
            <textarea name="ketfas" id="ketfas" placeholder="Keterangan Kategori"><?php echo $rf['ketfas']; ?></textarea>
            <p><img src="<?php echo "../fotofasilitas/$rf[foto1]"; ?>" height="200px">
                <input name="foto1" type="file" id="foto1">
            <p><img src="<?php echo "../fotofasilitas/$rf[foto2]"; ?>" height="200px"></br>
                <input name="foto2" type="file" id="foto2"></br>
            <input name="simpan" type="submit" id="simpan" value="SIMPAN KATEGORI">
        </form>

        <?php
        if (isset($_POST["simpan"])) {
            if (!empty($_POST["namafas"]) && !empty($_POST["ketfas"])) {
                $nmfoto1 = $_FILES["foto1"]["name"];
                $lokfoto1 = $_FILES["foto1"]["tmp_name"];
                if (!empty($lokfoto1)) {
                    move_uploaded_file($lokfoto1, "../fotofasilitas/$nmfoto1");
                    $foto1 = ", foto1='$nmfoto1'";
                } else {
                    $foto1 = "";
                }

                $nmfoto2 = $_FILES["foto2"]["name"];
                $lokfoto2 = $_FILES["foto2"]["tmp_name"];
                if (!empty($lokfoto2)) {
                    move_uploaded_file($lokfoto2, "../fotofasilitas/$nmfoto2");
                    $foto2 = ", foto2='$nmfoto2'";
                } else {
                    $foto2 = "";
                }
                $sqlf = mysqli_query($kon, "UPDATE fasilitas SET namafas = '$_POST[namafas]', ketfas = '$_POST[ketfas]' $foto1 $foto2 WHERE idfas = '$_POST[idfas]'");

                if ($sqlf) {
                    echo "Fasilitas Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }

                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=fasilitas'>";
            } else {
                echo "Isi data dengan lengkap";
            }
        }
        ?>
    </div>
</div>
</div>
				</div>
			</div>
		</div>