<div class="content">
		<div class="jarak">
				<div class="border">
					<div class="jarak">

<a href="<?php echo "?p=fasilitas"; ?>"><button type="button" class="btn btn-add">Fasilitas</button></a> &raquo;
<button type="button" class="btn btn-dis">Tambah Fasilitas</button> <br>

<div class="card">
    <div class="kepalacard">Tambah Fasilitas</div>
    <div class="isicard" style="text-align:center;">

        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <input name="namafas" type="text" id="namafas" placeholder="Nama Fasilitas">
            <textarea name="ketfas" id="ketfas" placeholder="Keterangan Fasilitas"></textarea>
            <input name="foto1" type="file" id="foto1">
            <input name="foto2" type="file" id="foto2"></br>
            <input name="simpan" type="submit" id="simpan" value="Simpan Fasilitas">
        </form>

        <?php
        if (isset($_POST["simpan"])){
            if(!empty($_POST["namafas"]) && !empty($_POST["ketfas"])){
                $nmfoto1 = $_FILES["foto1"]["name"];
                $lokfoto1 = $_FILES["foto1"]["tmp_name"];
                if(!empty($lokfoto1)){
                    move_uploaded_file($lokfoto1, "../fotofasilitas/$nmfoto1");
                }
        
                $nmfoto2 = $_FILES["foto2"]["name"];
                $lokfoto2 = $_FILES["foto2"]["tmp_name"];
                if(!empty($lokfoto2)){
                    move_uploaded_file($lokfoto2, "../fotofasilitas/$nmfoto2");
                }
        
                $sqlf = mysqli_query($kon,"insert into fasilitas (idfas, idadmin, namafas, ketfas, foto1, foto2, tglfas) values ('$rf[idfas]','$ra[idadmin]', '$_POST[namafas]','$_POST[ketfas]','$nmfoto1','$nmfoto2', NOW())");
        
                if($sqlf){
                    echo "Fasilitas Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan";
                }
                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=fasilitas'>";
            } else {
                echo "Isi Data dengan Lengkap";
            }
        }
        ?>
    </div>
</div>
<br>
					</div>
				</div>
			</div>
		</div>
