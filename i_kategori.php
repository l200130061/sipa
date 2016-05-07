<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
	
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$id_kategori=$_POST['id_kategori'];
$nama_kategori=$_POST['nama_kategori'];
$submit=$_POST['submit'];

if($submit){
	$sql="insert into kategori (id_kategori,nama_kategori) values ('$id_kategori','$nama_kategori')";
	mysql_query($sql);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=kategori';
			</script>	
			<?php
}
?>

<article class="module width_full">
	<header><h3>Input Data Kategori</h3></header>
	<div class="module_content">

<form method="post">
<table class="tbl_form">
				<tr>
					<td width="20%">Kode Kategori</td>
					<td>:</td>
					<td><input type="text" name="id_kategori" placeholder="Kode Kategori">
					</td>
				</tr>
				<tr>
					<td>Nama Kategori</td>
					<td>:</td>
					<td><input type="text" name="nama_kategori" placeholder="Nama Kategori" size="40">
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