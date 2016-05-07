<?php
include "koneksi.php"; // menghubungkan ke file koneksi.php agar terhubung dengan database
$id_ruang = $_GET['id_ruang'];
$delete = "delete from ruang where id_ruang='$id_ruang' ";
mysql_query($delete);
?>


<article class="module width_full">
	<header>
		<h3>Data Ruang</h3>
	</header>
	<div class="module_content">

		<table class="tbl_form">
			<tr>
					<?php  
						if ($_SESSION['status']=="Admin") {
							echo "<td><a href='?page=i_ruang'><input type='submit' value='Tambah Ruang' id='tombol'></a></td>";
						}
					?>
				<td align="right">
					<form action="" method="post">
	   					<select name="input_cari">
	   						<option value="<?php $db; ?>">Search by</option>
	   						<?php  
	   							$db = mysql_query("SELECT*from ruang");
								while ($row = mysql_fetch_array($db)) {
									echo "<option value='$row[id_ruang]'>$row[id_ruang]</option>";
								}
	   						?>
	   					</select>
	   					<input type="submit" name="cari" value="Cari" id="tombol">
	  				</form>
				</td>
			</tr>
	  	</table>
	  	<br>

	<table class="tbl_form" id="data" border="1">
	  <tr>
	  	<th>Nomor</th>
	  	<th>Kode Ruang</th>
	   	<th>Nama Ruang</th>
	   	<th>Penanggung Jawab</th>
	   	<th>Aksi</th>
	  </tr>
	   <?php 
	   $no=1;
	   $input_cari = @$_POST['input_cari']; 
	   $cari = @$_POST['cari'];

	   // jika tombol cari di klik
		if($cari) {

			// jika kotak pencarian tidak sama dengan kosong
	    	if($input_cari != "") {
	    		// query mysql untuk mencari berdasarkan nama negara. .
	    		$sql = mysql_query("SELECT * from ruang where nama_ruang like '%$input_cari%' or id_ruang like '%$input_cari%' ") or die (mysql_error());   
	    	} else {
	    		$sql = mysql_query("select * from ruang") or die (mysql_error());
	    	}
	    } else {
	    	$sql = mysql_query("select * from ruang") or die (mysql_error());
	    }

		// mengecek data
		$cek = mysql_num_rows($sql);
		// jika data kurang dari 1
		if($cek < 1) {
		?>
			<tr> <!--muncul peringata bahwa data tidak di temukan-->
				<td colspan="3" align="center"> Data Tidak Ditemukan</td>
	     	</tr>
	    <?php
		} else {

		// mengulangi data agar tidak hanya 1 yang tampil
		while($data = mysql_fetch_array($sql)) {

		?>
		<tr align="center">
			<td><?php echo $no; ?></td>
	    	<td><?php echo $data['id_ruang'] ?></td>
	    	<td><?php echo $data['nama_ruang'] ?></td>
	    	<td><?php echo $data['p_jawab'] ?></td>
	    
	    	<!--Hanya pemanis tampilan-->
	    	<td align="center">
	    		<?php

	    		if ($_SESSION['status']=="Admin") {
					echo "<a href='?page=edit_r&update=$data[0]'><img src='images/edit.png' width='30' height='30'></a>
						<a href='?page=delete_r&id_ruang=$data[0]'><img src='images/delete.png' width='30' height='30'></a>";
				}
	    		?>
	    	</td>
	   	</tr>
		<?php 
			$no++;
	  } 
	 }
	?>
	 </table>

	</div>
</article>
 
	  