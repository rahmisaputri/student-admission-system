<div class="content">
		<div class="jarak">
				<div class="border">
					<div class="jarak">

<a href="<?php echo "?p=prodi"; ?>"><button type="button" class="btn btn-add">Prodi</button></a> &raquo;

<div class="card">
    <div class="kepalacard">Tambah Jurusan</div>
    <div class="isicard" style="text-align:center;">

        <form name="form1" method="post" action="" enctype="multipart/form-data">
            <input name="nama_prodi" type="text" id="nama_prodi" placeholder="Nama Prodi"></br>
            <input name="detail" type="text" id="detail" placeholder="Detail"></br>
            <input name="biaya" type="text" id="biaya" placeholder="Biaya Kuliah"></br>
            <input name="simpan" type="submit" id="simpan" value="Simpan">
        </form>

        <?php
        if (isset($_POST["simpan"])){
            if(!empty($_POST["nama_prodi"]) && !empty($_POST["detail"]) && !empty($_POST["biaya"])){
                $sqlfa = mysqli_query($kon,"insert into prodi (idprodi, idadmin, nama_prodi,detail ,biaya,tglinput) values ('$rfa[idprodi]','$ra[idadmin]','$_POST[nama_prodi]','$_POST[detail]','$_POST[biaya]', NOW())");
        
                if($sqlfa){
                    echo "Data Berhasil Disimpan";
                } else {
                    echo "Gagal Menyimpan". mysqli_error($kon);
                }
               
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
