
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];

$sql="SELECT * FROM `kategori` WHERE `id_kategori` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>

<article class="module width_full">
	<header><h3>Edit Data Kategori</h3></header>
	<div class="module_content">
		<form method="post" action="?page=edit_k&update=<?php echo $update;?>">
			<table class="tbl_form">
				
				<tr>
					<td width="20%">Kode Kategori</td>
					<td>:</td>
					<td><input type='text' name='id_kategori' value='<?php echo $row[id_kategori] ?>'></td>
				</tr>
				<tr>
					<td>Nama Kategori</td>
					<td>:</td>
					<td><input type='text' name='nama_kategori' value='<?php echo $row[nama_kategori] ?>'></td>
				</tr>
<tr align="right"><td></td><td></td><td><input id="tombol" type="submit" name="submit" value="Simpan"></td></tr>
			</table>
		</form>
<?php
$id_kategori=$_POST['id_kategori'];
$nama_kategori=$_POST['nama_kategori'];
$submit=$_POST['submit'];
if ($submit) {
	$sql = "update kategori set id_kategori='$id_kategori' , nama_kategori='$nama_kategori' where id_kategori='$update' ";
	mysql_query($sql);
	?>
			<script language script="JavaScript">
			alert('Data Berhasil Diedit');
			document.location='?page=kategori';
			</script>	
			<?php

}
?>
	</div>
</article>
