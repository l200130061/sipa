<!--koneksi database & table barang-->
<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];

$sql="SELECT * FROM `barang` WHERE `nomor` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>

<!--membuat isi konten-->
<article class="module width_full">
	<header><h3>Edit Data Barang</h3></header>
	<div class="module_content">
		<form method="post" action="?page=edit_b&update=<?php echo $update;?>">

			<!--membuat form edit-->
			<table class="tbl_form">
				<tr>
					<td>Kode Barang</td>
					<td>:</td>
					<td><?php echo $row[kode_gabung] ?></td>
				</tr>
				<tr>
					<td>Kondisi</td>
					<td>:</td>
					<td><select name="kondisi">
							<option selected><?php echo $row[kondisi]?></option>
				    		<option value="Baik">Baik</option>
				    		<option value="Cukup Baik">Cukup Baik</option>
							<option value="Rusak">Rusak</option>
						</select>
					</td>
				</tr>
				<tr>
					<td valign="top">Spesifikasi</td valign="top">
					<td>:</td>
					<td><textarea name="spesifikasi" rows="5" cols="50"><?php echo $row[spesifikasi]; ?></textarea></td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>:</td>
					<td><input type="text" name="lokasi" placeholder="Lokasi" value="<?php echo $row[lokasi]; ?>" size="40"></td>
				</tr>
				<tr align="right">
					<td></td>
					<td></td>
					<td><input id="tombol" type="submit" name="submit" value="Simpan"></td>
				</tr>
			</table>
		</form>

		<!--script edit-->
		<?php
		$nomor = $_POST['nomor'];
		$merk=$_POST['merk'];
		$kondisi=$_POST['kondisi'];
		$spesifikasi=$_POST['spesifikasi'];
		$lokasi=$_POST['lokasi'];
		$submit=$_POST['submit'];
		if ($submit) {
			$sql = "UPDATE barang set kondisi='$kondisi' , spesifikasi='$spesifikasi', lokasi='$lokasi' where nomor='$update' ";
			mysql_query($sql);
			?>
					<script language script="JavaScript">
					alert('Data Berhasil Diedit');
					document.location='?page=barang';
					</script>	
					<?php

		}
		?>
	</div>
</article>
