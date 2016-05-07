<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$status_peminjam=$_POST['status_peminjam'];
$nim=$_POST['nim'];
$nama_peminjam=$_POST['nama_peminjam'];
$nomor_telp=$_POST['nomor_telp'];
$kode_gabung=$_POST['kode_gabung'];
$nama_barang=$_POST['nama_barang'];
$tgl_pinjam=$_POST['tgl_pinjam'];
$tgl_kembali=$_POST['tgl_kembali'];
$status_barang=$_POST['status_barang'];
$submit=$_POST['submit'];
if($submit){
	$query="insert into pinjam (status_peminjam,nim,nama_peminjam,nomor_telp,kode_gabung,nama_barang,tgl_pinjam,tgl_kembali,status_barang) values ('$status_peminjam','$nim','$nama_peminjam','$nomor_telp','$kode_gabung','$nama_barang','$tgl_pinjam','$tgl_kembali','$status_barang')";
	mysql_query($query);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=peminjaman';
			</script>
	<?php
	$query2="update barang set status_barang='$status_barang' where kode_gabung='$kode_gabung'";
	mysql_query($query2);
}
?>
<style type="text/css">
table {
	font-size: 12px;
}
</style>
<article class="module width_full">
	<header><h3>Input Peminjaman Barang</h3></header>
	<div class="module_content">
		<form method="post">
			<table class="tbl_form">
			<tr>
				<td>Status Peminjam</td>
				<td>:</td>
				<td> <select name="status_peminjam"><option>Pilih Status Perminjam</option>
						<option value="Mahasiswa">Mahasiswa</option>
						<option value="Dosen">Dosen</option>
						<option value="Karyawan">Karyawan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>NIM / NIK / NIP</td>
				<td>:</td>
				<td><input type='text' name='nim'></td>
			</tr>
			<tr>	
				<td>Nama Peminjam</td>
				<td>:</td>
				<td><input type='text' name='nama_peminjam'></td>
			</tr>
			<tr>	
				<td>Nomor Telepon</td>
				<td>:</td>
				<td><input type='text' name='nomor_telp'></td>
			</tr>
			<tr>	
				<td>Kode Barang</td>
				<td>:</td>
				<td>
					<input type='text' name='kode_gabung' id='kode_gabung' onClick="window.open('http://localhost/zz/view_barang.php','popuppage','width=900,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=100');">
				</td>
			</tr>
			<tr>	
				<td>Nama Barang</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_barang" id='sub_kategori' readonly="readonly" >
				</td>
			</tr>
			<tr>	
				<td>Tanggal Pinjam</td>
				<td>:</td>
				<td><input type='date' name='tgl_pinjam'>
				Tanggal Kembali
				:
				<input type='date' name='tgl_kembali'></td>
			</tr>
			<tr>	
				<td>Status Barang</td>
				<td>:</td>
				<td><select name="status_barang">
						<option value="Dipinjam">Dipinjam</option>
						<option value="Tersedia">Dikembalikan</option>
					</select>
				</td>
			</tr>
			<tr align="right">
				<td></td>
				<td></td>
				<td><input type='submit' name='submit' value='Tambahkan' id="tombol"></td>
			</tr>
			</table>
		</form>
<br>

</div>
</article>

<center>