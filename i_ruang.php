<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
	
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$nomor=$_POST['nomor'];
$id_ruang=$_POST['id_ruang'];
$nama_ruang=$_POST['nama_ruang'];
$p_jawab=$_POST['p_jawab'];
$submit=$_POST['submit'];

if($submit){
	$sql="insert into ruang (id_ruang,nama_ruang,p_jawab) values ('$id_ruang','$nama_ruang','$p_jawab')";
	mysql_query($sql);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=ruang';
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
					<td width="20%">Kode Ruang</td>
					<td>:</td>
					<td><input type="text" name="id_ruang" placeholder="Kode Ruang">
					</td>
				</tr>
				<tr>
					<td>Nama Ruang</td>
					<td>:</td>
					<td><input type="text" name="nama_ruang" placeholder="Nama Ruang" size="40">
					</td>
				</tr>
				<tr>
					<td>Penanggung Jawab</td>
					<td>:</td>
					<td><input type="text" name="p_jawab" placeholder="Nama dan Gelar" size="40"></td>
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