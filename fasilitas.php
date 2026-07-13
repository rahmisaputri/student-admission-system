<style>
    img{
        width:8pc;
        height:6pc;
    }
    .isicard{
	padding-top: 10px;
}
.isicard h4{
	text-align: center;
	margin-bottom: 10px;
	margin-top: 4px;
}
.isicard img{
	margin-bottom: 10px;
}
</style>
<body>
    <h3 style="padding-left:50px;">FASILITAS</h3>
    <div class="tepi">
<?php
$sqlf = mysqli_query($kon, "select * from fasilitas order by namafas asc");
while ($rf = mysqli_fetch_array($sqlf)) {
    echo "<div class='jarak'>";
    echo "<div class='card'>";
    echo "<div class='isicard'>";
    echo "<br>";
    echo "<h4>$rf[namafas]</h4>
    <hr><img style='margin-left:30%;' src='fotofasilitas/$rf[foto1]' border='1' width='150px'>
        <img style='margin-left:20px;' src='fotofasilitas/$rf[foto2]' border='1' width='150px'></br>
       ";
    echo "</div>";
    echo "</div>";
    echo "</div><br>";
}
?>
</div>
        </body>