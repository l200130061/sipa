<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
	
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$id_subkategori=$_POST['id_subkategori'];
$id_kategori=$_POST['id_kategori'];
$nama_sub_kategori=$_POST['nama_sub_kategori'];
$submit=$_POST['submit'];

if($submit){
	$sql="insert into sub_kategori (id_subkategori,id_kategori,nama_sub_kategori) values ('$id_subkategori','$id_kategori','$nama_sub_kategori')";
	mysql_query($sql);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=sub_kategori';
			</script>	
			<?php
}
?>

<article class="module width_full">
	<header><h3>Input Data Sub Kategori</h3></header>
	<div class="module_content">

<form method="post">
<table class="tbl_form">
				<tr>
					<td width="20%">Kode Sub Kategori</td>
					<td>:</td>
					<td><input type="text" name="id_subkategori" placeholder="Kode Sub Kategori">
					</td>
				</tr>
				<tr>
					<td width="20%">Kode Kategori</td>
					<td>:</td>
					<td><select name="id_kategori" id="kategori">
												<option value="">Pilih Kategori</option>
												<?php
												$bidang = mysql_query("select * from kategori");
												while($p=mysql_fetch_array($bidang)){
													echo "<option value='$p[id_kategori]'>$p[nama_kategori]</option>";
												}
												?><script language="javascript">
											$("#sub_kategori").chained("#kategori");  
											</script>
						</select>
					</td>
				</tr>
				<tr>
					<td>Nama Kategori</td>
					<td>:</td>
					<td><input type="text" name="nama_sub_kategori" placeholder="Nama Sub Kategori" size="40">
					</td>
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