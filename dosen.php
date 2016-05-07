<?php
error_reporting(E_ALL^E_NOTICE);
include 'koneksi.php';

$nip = $_GET['nip'];
$delete = "delete from tanda_tangan where nip='$nip' ";
mysql_query($delete);

$sql="select*from tanda_tangan";
$query=mysql_query($sql);
?>
<article class="module width_full">
	<header><h3>Data Dosen / Staff</h3></header>
		<div class="module_content">
			<table class="tbl_form">
				<tr>
					<?php  
						if ($_SESSION['status']=="Admin") {
							echo "<td><a href='?page=i_dosen'><input type='submit' value='Tambah Dosen' id='tombol'></a></td>";
						}
					?>
				</tr>
			</table><br>
			<table border='1' class="tbl_form" id="data">
				<tr>
					<th>Nomor</th>
					<th>NIP/NIK</th>
					<th>Nama</th>
					<th>Status</th>
					<?php 
						if ($_SESSION['status']=="Admin") {
							echo "<th>Aksi</th>";
						}
					?>
				</tr>

<?php
	$nomor=1;
	$a="select*from tanda_tangan";
	$query=mysql_query($a);
	while($row=mysql_fetch_row($query)){
		echo "
		<tr align='center'>
			<td>$nomor</td>
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[2]</td>
			";
				if ($_SESSION['status']=="Admin") {
					echo "<td><a href='?page=edit_d&update=$row[0]'><img src='images/edit.png' width='30' height='30'></a>
						<a href='?page=delete_d&nip=$row[0]'><img src='images/delete.png' width='30' height='30'></a>
				</td>";
				}
		"</tr>";
		$nomor++;
	}
	?>
</table>
		</div>
</article><!-- end of styles article -->