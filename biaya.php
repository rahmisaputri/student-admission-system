<body>
<div class="tepi">
        <link rel="stylesheet" type="text/css" href="style.css">
        <h4>Daftar Nama Dan Biaya Kuliah</h4>
        <p>Berikut merupakan nama prodi dan biaya kuliah</p>
<?php
	echo "<table width='95%' cellspasing='10' cellpadding='10'>";
	echo "<tr>
			<th style= 'background-color: #FFA500;border: 1px solid #333;'>No</th>
			<th style= 'background-color: #FFA500;border: 1px solid #333;'>Nama Prodi</th>
			<th style= 'background-color: #FFA500;border: 1px solid #333;'>Biaya Kuliah</th>
		</tr>";
	$sqlp = mysqli_query ($kon, "select * from prodi order by tglinput desc");
	$no = 1;
	while($rp = mysqli_fetch_array($sqlp)){
		echo "<tr>
			<td style= 'background-color: #ddd;'>$no</td>
			<td style= 'background-color: #ddd;'>
				 	$rp[nama_prodi]</br>
			</td >

			<td style= 'background-color: #ddd;'>
                    $rp[biaya]
			</td>
			</tr>";
		$no++;
		}
	echo "</table>";
	
?>				
</div>
        </body>