<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>

<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];

$sql="SELECT * FROM `sub_kategori` WHERE `id_subkategori` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>


<article class="module width_full">
	<header><h3>Edit Data Sub Kategori</h3></header>
	<div class="module_content">
		<form method="post" action="?page=edit_s&update=<?php echo $update;?>">
			<table class="tbl_form">
				<tr>
					<td width="20%">Kode Kategori</td>
					<td>:</td>
					<td><input type='text' name='id_kategori' value='<?php echo $row[id_kategori] ?>'></td>
				</tr>
				<tr>
					<td valign="top">Kode Sub Kategori</td valign="top">
					<td>:</td>
					<td><input type='text' name='id_subkategori' value='<?php echo $row[id_subkategori] ?>'></td>
				<tr>
					<td>Nama Sub Kategori</td>
					<td>:</td>
					<td><input type='text' name='nama_sub_kategori' value='<?php echo $row[nama_sub_kategori] ?>'></td>
				</tr>
				<tr align="right">
					<td></td>
					<td></td>
					<td><input id="tombol" type="submit" name="submit" value="Simpan"></td>
				</tr>
			</table>
		</form>
<?php
$id_subkategori = $_POST['id_subkategori'];
$id_kategori=$_POST['id_kategori'];
$nama_sub_kategori=$_POST['nama_sub_kategori'];
$submit=$_POST['submit'];
if ($submit) {
	$sql = "UPDATE sub_kategori set id_subkategori='$id_subkategori' , id_kategori='$id_kategori', 
	nama_sub_kategori='$nama_sub_kategori' where id_subkategori='$update' ";
	mysql_query($sql);
	?>
			<script language script="JavaScript">
			alert('Data Berhasil Diedit');
			document.location='?page=sub_kategori';
			</script>	
			<?php

}
?>
	</div>
</article>