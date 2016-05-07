<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
//$status_barang = $_POST['status_barang'];

$sql="SELECT * FROM `pinjam` WHERE `id_pinjam` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>


<article class="module width_full">
	<header><h3>Edit Data Peminjaman</h3></header>
	<div class="module_content">
			<form method="post" autocomplete="on">
<table class="tbl_form">

<tr>	
	<td>Kode Barang</td>
	<td>:</td>
	<td>
		<?php echo $row[kode_gabung]; ?>
	</td>
</tr>
<tr>	
	<td>Tanggal Pinjam</td>
	<td>:</td>
	<td><input type='date' name='tgl_pinjam' value="<?php echo $row[tgl_pinjam]; ?>">
	Tanggal Kembali
	:
	<input type='date' name='tgl_kembali' value="<?php echo $row[tgl_kembali]; ?>"></td>
</tr>
<tr>	
	<td>Status Barang</td>
	<td>:</td>
	<td><select name="status_barang" value="<?php $row[status_barang]; ?>">
			<option value="Dipinjam">Dipinjam</option>
			<option value="Tersedia">Dikembalikan</option>
		</select>
	</td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td align="right">
		<input type='submit' name='submit' value='Simpan' id="tombol"></a>
	</td>
</tr>
</table>
</form>

<?php
$ids=sha1($result['kode_gabung']); 
$id_pinjam = $_POST['id_pinjam'];
$kode_gabung = $_POST['kode_gabung'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$status_barang = $_POST['status_barang'];
$submit = $_POST['submit'];
if ($submit) {
	$sql = "UPDATE pinjam SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', status_barang='$status_barang' WHERE id_pinjam = $update";
	mysql_query($sql);
	$sql2="UPDATE barang SET status_barang='$status_barang' WHERE kode_gabung='$row[kode_gabung]'";
	mysql_query($sql2);
	?>
	<script type="text/javascript">
		alert('Data berhasil di edit.');
		document.location='?page=peminjaman';
	</script>
	<?php
	
}
?>

		</div>
</article>

<?php
	
	?>  
    <!--<td><a href="#" onClick="sendValue('<?php echo $result['kode_gabung']; ?>','<?php echo $result['sub_kategori']; ?>');">
    <span class="btn btn-success"><i class="icon-edit"></i>Pilih</span></a></td>   -->