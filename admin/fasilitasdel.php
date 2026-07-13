<?php
$sqlf = mysqli_query($kon, "delete from fasilitas where idfas='$_GET[id]'");
if($sqlf){
	echo "Produk Berhasil Dihapus";
}else{
	echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=fasilitas'>";
?>