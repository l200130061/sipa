<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/ie.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function sendValue (s,s2){

window.opener.document.getElementById('kode_gabung').value = s;
window.opener.document.getElementById('sub_kategori').value = s2;
window.close();
}
//  End -->
</script>
<center>
<h2>Data Barang</h2>
<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	/* Koneksi database*/
	include 'koneksi.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 100; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal - 1) * $per_hal;
	$reload="view_barang.php?";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(kode_gabung) AS numrows FROM barang");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * FROM barang where status_barang !='Dipinjam' GROUP BY kode_gabung LIMIT $offset,$per_hal");

?>

<article class="module width_full">
	<div class="module_content">
	<table class="tbl_form" id="data" border="1">
<tr>

	<th>Kode Barang</th>
	<th>Kategori</th>
	<th>Sub Kategori</th>
	<th>Merk</th>
	<th>Kondisi</th>
	<th>Spesifikasi</th>
	<th>Aksi</th>

</tr>
<?php
while($result = mysql_fetch_array($query)){
?>
<tr align="center">
    
    <td><?php echo $result['kode_gabung']; ?></td> 
	<td><?php echo $result['kategori']; ?></td> 
    <td><?php echo $result['sub_kategori']; ?></td> 
    <td><?php echo $result['merk']; ?></td>
	<td><?php echo $result['kondisi']; ?></td> 
	<td><?php echo $result['spesifikasi']; ?></td> 
    <?php
	$ids=sha1($result['kode_gabung']);
	?>  
    <td><a href="#" onClick="sendValue('<?php echo $result['kode_gabung']; ?>','<?php echo $result['sub_kategori']; ?>');"><span class="btn btn-success"><i class="icon-edit"></i>Pilih</span></a></td>   
  </tr>
<?php
}
?>
</table>

</div>
</article>
