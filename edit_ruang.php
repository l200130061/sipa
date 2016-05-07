<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>

<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];

$sql="SELECT * FROM `ruang` WHERE `id_ruang` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>

<article class="module width_full">
	<header><h3>Edit Data Ruang</h3></header>
	<div class="module_content">
		<form method="post" action="?page=edit_r&update=<?php echo $update;?>">
			<table class="tbl_form">
				
				<tr>
					<td width="20%">Kode Ruang</td>
					<td>:</td>
					<td><input type='text' name='id_ruang' value='<?php echo $row[id_ruang] ?>'></td>
				</tr>
				<tr>
					<td>Kondisi</td>
					<td>:</td>
					<td><input type='text' name='nama_ruang' value='<?php echo $row[nama_ruang] ?>' size='40'></td>
				</tr>
				<tr>
					<td>Penanggung Jawab</td>
					<td>:</td>
					<td><input type='text' name="p_jawab" value='<?php echo $row[p_jawab]; ?>' size='40'</td>
				</tr>
<tr align="right"><td></td><td></td><td><input id="tombol" type="submit" name="submit" value="Simpan"></td></tr>
			</table>
		</form>
<?php
$id_ruang=$_POST['id_ruang'];
$nama_ruang=$_POST['nama_ruang'];
$p_jawab=$_POST['p_jawab'];
$submit=$_POST['submit'];
if ($submit) {
	$sql = "update ruang set id_ruang='$id_ruang' , nama_ruang='$nama_ruang', p_jawab='$p_jawab' where id_ruang='$update' ";
	mysql_query($sql);
	?>
			<script language script="JavaScript">
			alert('Data Berhasil Diedit');
			document.location='?page=ruang';
			</script>	
			<?php

}
?>
	</div>
</article>
