<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
	
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$nip=$_POST['nip'];
$nama_pegawai=$_POST['nama_pegawai'];
$status=$_POST['status'];
$submit=$_POST['submit'];

if($submit){
	$sql="insert into tanda_tangan (nip,nama_pegawai,status) values ('$nip','$nama_pegawai', '$status')";
	mysql_query($sql);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=dosen';
			</script>	
			<?php
}
?>

<article class="module width_full">
	<header><h3>Input Data Dosen / Staff</h3></header>
	<div class="module_content">

<form method="post">
<table class="tbl_form">
				<tr>
					<td width="20%">NIP/NIK</td>
					<td>:</td>
					<td><input type="text" name="nip" placeholder="NIP / NIK">
					</td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td><input type="text" name="nama_pegawai" placeholder="Nama Lengkap dan Gelar" size="40">
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>
					<select name="status">
						<option>--Pilih Status--</option>
						<option value="Kepala Laboratorium">Kepala Laboratorium</option>
						<option value="Dosen">Dosen</option>
						<option value="Karyawan">Karyawan</option>
					</select>
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