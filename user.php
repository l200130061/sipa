<?php
error_reporting(E_ALL^E_NOTICE);
include 'koneksi.php';

$id_user = $_GET['id_user'];
$delete = "DELETE from user where id_user='$id_user' ";
mysql_query($delete);

$sql="SELECT*from user";
$query=mysql_query($sql);
?>
<article class="module width_full">
	<header><h3>Data Admin dan User</h3></header>
		<div class="module_content">
			<table class="tbl_form">
				<tr>
					<td><a href="?page=i_user"><input type="submit" value="Tambah Akun" id="tombol"></a></td>
				</tr>
			</table><br>
			<table border='1' class="tbl_form" id="data">
				<tr>
					<th>Nomor</th>
					<th>Identitas</th>
					<th>Username</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>

<?php
	$nomor=1;
	$a="SELECT*from user order by id_user asc";
	$query=mysql_query($a);
	while($row=mysql_fetch_row($query)){
		echo "
		<tr align='center'>
			<td>$nomor</td>
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[3]</td>
			<td>
				<a href='?page=edit_u&update=$row[0]'><img src='images/edit.png' width='30' height='30'></a>
				<a href='?page=delete_u&id_ruang=$row[0]'><img src='images/delete.png' width='30' height='30'></a>
			</td>
			
		</tr>";
		$nomor++;
	}
	?>
</table>
		</div>
</article><!-- end of styles article -->