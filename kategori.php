<?php
error_reporting(E_ALL^E_NOTICE);
include 'koneksi.php';

$id_kategori = $_GET['id_kategori'];
$delete = "delete from kategori where id_kategori='$id_kategori' ";
mysql_query($delete);

$sql="select*from kategori";
$query=mysql_query($sql);
?>
<article class="module width_full">
	<header><h3>Kode Kategori Barang</h3></header>
		<div class="module_content">
			<table class="tbl_form">
				<tr>
					<td><a href="?page=i_kategori"><input type="submit" value="Tambah Kategori" id="tombol"></a></td>
				</tr>
			</table><br>
			<table border='1' class="tbl_form" id="data">
				<tr>
					<th>Nomor</th>
					<th>Kode Kategori</th>
					<th>Nama Kategori</th>
					<th>Aksi</th>
				</tr>

<?php
	$no=1;
	$a="select*from kategori order by id_kategori asc";
	$query=mysql_query($a);
	while($row=mysql_fetch_row($query)){
		echo "
		<tr align='center'>
			<td>$no</td>
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>
				<a href='?page=edit_k&update=$row[0]'><img src='images/edit.png' width='30' height='30'></a>
				<a href='?page=delete_k&id_kategori=$row[0]'><img src='images/delete.png' width='30' height='30'></a>
			</td>
			
		</tr>";
		$no++;
	}
	?>
</table>
		</div>
</article><!-- end of styles article -->