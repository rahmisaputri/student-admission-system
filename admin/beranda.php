<style>
    .content1 {
  padding: 10px;
  text-align: center; 
  display: flex;
  margin-top:100px;

}
.card1 {
    width: 30%;
  background-color: #f2f2f2;
  border: 1px solid #FFA500;
  display:inline-block;
  margin: 10px;
  padding: 20px;
  font-size:15px;
  padding-bottom:30px;
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
  h2{
	text-align:center;
	padding-top:20px;
	fonr-family:arvo;
  }
  img{
	width:15pc;
	height:10pc;
  }

</style>
<div class="content1">
		<div class="card1">
			<h3>Data Pendaftar</h3>
			<img src="../foto/2.jpg" alt="Fakultas Ekonomi"width='200px'>
			<p>Lihat Detail Untuk Mengetahui Data pendaftar Pada universitas.</p>
            <a href='?p=pendaftar'><button type='button' class='btn btn-add'>Lihat Detail Pendaftar</button></a>
			
		</div>
		<div class="card1">
			<h3>Data Fasilitas</h3>
			<img src="../foto/1.jpg"  alt="Fakultas Komputer"width='200px' >
			<p>Lihat Detail Untuk Mengubah Dan Tambah Data pendaftar Fasilitas.</p>
            <a href='?p=fasilitas'><button type='button' class='btn btn-add'>Data Fasilitas</button></a>
		
		</div>
		<div class="card1">
			<h3>Data Jurusan</h3>
			<img src="../foto/3.jpg"  alt="Fakultas Teknik" width='200px'>
			<p>Lihat Detail Untuk Mengubah Data Jurusan Universitas.</p>
            <a href='?p=prodi'><button type='button' class='btn btn-add'>Data Jurusan</button></a>
		
		</div>
</div>