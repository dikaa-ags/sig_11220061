<!-- JavaScript untuk tombol hapus (dinonaktifkan dengan komentar) -->
<!--
<script type="text/javascript">
	$(document).ready(function() {
		$(".delbutton").click(function(){
		 var element = $(this);
		 var del_id = element.attr("id");
		 var info = 'nomor=' + del_id;
		 if(confirm("Anda yakin akan menghapus?"))
		 {
			 $.ajax({
			 type: "POST",
			 url : "hapus_lokasi.php",
			 data: info,
			 success: function(){
			 }
			 });	
			 $(this).parents(".content").animate({ opacity: "hide" }, "slow");
 			}
		 return false;
		 });
	});
</script>
-->

<?php
include('koneksi.php');

// Ambil 10 data terbaru yang status = 1
$lokasi = mysqli_query($koneksi, "SELECT * FROM kordinat_gis WHERE status = 1 ORDER BY nomor DESC LIMIT 10");

while($koor = mysqli_fetch_array($lokasi)){
?>
	<ul>
		<li class="content">
			<a href="javascript:carikordinat(new google.maps.LatLng(<?php echo $koor['x']; ?>, <?php echo $koor['y']; ?>))">
				<?php echo htmlspecialchars($koor['nama_tempat']); ?>
			</a>
			<!-- Tombol hapus dinonaktifkan -->
			<!-- <a href="#" class="delbutton" id="<?php echo $koor['nomor']; ?>">(Hapus)</a> -->
		</li>
	</ul>
<?php
}
?>
