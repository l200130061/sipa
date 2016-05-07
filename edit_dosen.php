<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>

<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];

$sql="SELECT * FROM `tanda_tangan` WHERE `nip` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>

<article class="module width_full">
	<header><h3>Edit Data Dosen</h3></header>
	<div class="module_content">
		<form method="post" action="?page=edit_d&update=<?php echo $update;?>">
			<table class="tbl_form">
				
				<tr>
					<td width="20%">NIP/NIK</td>
					<td>:</td>
					<td><input type='text' name='nip' value='<?php echo $row[nip] ?>'></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type='text' name='nama_pegawai' value='<?php echo $row[nama_pegawai] ?>' size='40'></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>
					<select name="status">
						<option><?php echo $row[status]; ?></option>
						<option value="Kepala Laboratorium">Kepala Laboratorium</option>
						<option value="Dosen">Dosen</option>
						<option value="Karyawan">Karyawan</option>
					</select>
					</td>
				</tr>
<tr align="right"><td></td><td></td><td><input id="tombol" type="submit" name="submit" value="Simpan"></td></tr>
			</table>
		</form>
<?php
$nip=$_POST['nip'];
$nama_pegawai=$_POST['nama_pegawai'];
$status=$_POST['status'];
$submit=$_POST['submit'];
if ($submit) {
	$sql = "update tanda_tangan set nip='$nip' , nama_pegawai='$nama_pegawai', status='$status' where nip='$update' ";
	mysql_query($sql);
	?>
			<script language script="JavaScript">
			alert('Data Berhasil Diedit');
			document.location='?page=dosen';
			</script>	
			<?php

}
?>
	</div>
</article>
