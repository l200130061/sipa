<article class="module width_full">
	<header><h3>Pilih Tanda Tangan</h3></header>
	<div class="module_content">
		
		<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$nama_pegawai=$_POST['nama_pegawai'];
$submit=$_POST['submit'];
if($submit){
	$aktiv="UPDATE tanda_tangan set keaktivan='YA' where nip='$nama_pegawai'";
	mysql_query($aktiv);
	$tidak_aktiv="UPDATE tanda_tangan set keaktivan='TIDAK' where nip!='$nama_pegawai'";
	mysql_query($tidak_aktiv);
}
?>
<form method="post">
<table class="tbl_form">
	<tr>
		<td width="10%">Nama</td>
		<td width="20px">:</td>
		<td>
			<select name="nama_pegawai">
				<option align="center">-- Pilih Tanda Tanga --</option>
				<?php
				$sql = mysql_query("SELECT * FROM tanda_tangan");
				if(mysql_num_rows($sql) != 0){
					while($row = mysql_fetch_assoc($sql)){
						echo '<option value='.$row['nip'].'>'.$row['nama_pegawai']." - ".$row['status'].'</option>';
					}
				}
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td></td><td></td>
		<td><input type='submit' name='submit' value='Pilih' id="tombol"></td>
	</tr>
</table>
</form>
<?php
 $sql="selcet nama_pegawai from tanda_tangan where keaktivan='1'";
 $query=mysql_query($sql);
 echo "$query";
?>

	</div>
</article>