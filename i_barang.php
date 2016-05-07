
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$kode1=$_POST['kode1'];
$kode2=$_POST['kode2'];
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$nomor=$_POST['nomor'];
$kode_gabung=$kode1.'/'.$kode2.'/'.$bulan.'/'.$tahun.'/'.$nomor;
$kategori=$_POST['kategori'];
$sub_kategori=$_POST['sub_kategori'];
$merk=$_POST['merk'];
$kondisi=$_POST['kondisi'];
$spesifikasi=$_POST['spesifikasi'];
$status_barang=$_POST['status_barang'];
$lokasi=$_POST['lokasi'];
$submit=$_POST['submit'];

if($submit){
	$sql="insert into barang (kode1,kode2,bulan,tahun,nomor,kode_gabung,kategori,sub_kategori,merk,kondisi,spesifikasi,status_barang,lokasi) 
	values ('$kode1','$kode2','$bulan','$tahun','$nomor','$kode_gabung','$kategori','$sub_kategori','$merk','$kondisi','$spesifikasi','$status_barang','$lokasi')";
	mysql_query($sql);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=barang';
			</script>
	<?php
}
?>


<article class="module width_full">
	<header><h3>Input Data Ruang</h3></header>
	<div class="module_content">
		<form method="post">
			<table class="tbl_form">
				<tr>
					<td>Kode Barang</td>
					<td>:</td>
					<td><select name="kode1"><option>Kode</option>
				    		<option value="A1">A1</option>
							<option value="A2">A2</option>
						</select> /
						<select name="kode2"><option>Fakultas</option>
				    		<option value="INF">Informatika</option>
							<option value="KOM">Komunikasi</option>
						</select> /
						<select name="bulan"><option>Bulan</option>
				    		<option value="01">Januari</option>
				    		<option value="02">Februari</option>
				    		<option value="03">Maret</option>
				    		<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select> /
						<input type="text" name="tahun" placeholder="Tahun"> / 
						<input type="text" name="nomor" placeholder="Nomor">
					</td>
				</tr>
				<tr>
					<td>Kategori Barang</td>
					<td>:</td>
					<td>
						<select name="kategori" id="kategori">
												<option value="">Pilih Kategori</option> 
												<?php
												$bidang = mysql_query("select * from kategori");
												while($p=mysql_fetch_array($bidang)){
													echo "<option value='$p[id_kategori]'>$p[nama_kategori]</option>";
												}
												?>
						</select>
						<select name="sub_kategori" id="sub_kategori">
												<option value="">Pilih Sub Kategori</option>
												
												<?php
												$kelompok = mysql_query("select * from sub_kategori");
												while($k=mysql_fetch_array($kelompok)){
													echo "<option value='$k[id_subkategori]' class='$k[id_kategori]'>$k[nama_sub_kategori]</option>";
												}
												?>
						</select></a>
											<script language="javascript">
											$("#sub_kategori").chained("#kategori");  
											</script>
					</td>
				</tr>

				<tr><td>Merk</td>
					<td>:</td>
					<td><input type="text" name="merk" placeholder="Merk"></td>
				</tr>

				<tr>
					<td>Kondisi</td>
					<td>:</td><td>
						<select name="kondisi"><option>Kondisi</option>
				    		<option value="Baik">Baik</option>
							<option value="Cukup Baik">Cukup Baik</option>
							<option value="Rusak">Rusak</option>
						</select>
					</td>
				</tr>
				<tr>
					<td valign="top">Spesifikasi</td>
					<td valign="top">:</td>
					<td><textarea name="spesifikasi" rows="5" cols="50"  placeholder="Spesifikasi Barang"></textarea>
					</td>
				</tr>
				<tr>
					<td>Status Barang</td>
					<td>:</td><td>
						<select name="status_barang"><option>Status</option>
				    		<option value="Dipinjam">Dipinjam</option>
							<option value="Tersedia">Tersedia</option>
						</select>
					</td>
				</tr>
				<tr><td>Lokasi</td>
					<td>:</td>
					<td><input type="text" name="lokasi" placeholder="Lokasi"></td>
				</tr>
				<tr align="right">
					<td></td>
					<td></td>
					<td><input id="tombol" type="submit" name="submit" value="Tambahkan"></td>
				</tr>
			</table>
		</form>
	</div>
</article>