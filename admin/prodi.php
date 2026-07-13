<style>
	
</style>
<body>
<div class="content">
		<div class="jarak">


        <link rel="stylesheet" type="text/css" href="style.css">
        <button type="button" class="btn btn-btn">Prodi</button> 
<?php
	echo "<table width='100%' cellspasing='10' cellpadding='10'>";
	echo "<tr class='tabel' >
			<th style= 'background-color: #FFA500;'>No</th>
			<th style= 'background-color: #FFA500;'>Nama Prodi</th>
			<th style= 'background-color: #FFA500;'>Biaya Kuliah</th>
			<th style= 'background-color: #FFA500;'>Keterangan</th>
			<th style= 'background-color: #FFA500;'>Tanggal Input Data</th>
		</tr>";
	$sqlp = mysqli_query ($kon, "select * from prodi order by tglinput desc");
	$no = 1;
	while($rp = mysqli_fetch_array($sqlp)){
		echo "<tr>
			<td>$no</td>
			<td 'border: 2px solid #FFA500;'>
				 	<b>$rp[nama_prodi]</b> </br>
			</td>

			<td 'border: 2px solid #FFA500;'>
                    <b>IDR $rp[biaya]</b>
			</td>
			<td 'border: 2px solid #FFA500;'>
                    <b>$rp[detail]</b>
			</td>

			<td 'border: 2px solid #FFA500;'>
			        <b>$rp[tglinput] WIB</b>
            </td>
				</tr>";
		$no++;
		}
	echo "</table>";
	
?>
<a href="<?php echo "?p=prodiadd"; ?>"><button type="button" class="btn btn-add">Tambah Jurusan</button></a>
				</div>
			</div>
		</div>
        </body>