<!--koneksi dengan database-->
<?php
include "koneksi.php";
?>

<!--membuat isi konten-->
<article class="module width_full">
	<header><h3>Data Inventaris Barang</h3></header>
		<div class="module_content">

			<!--membuat print button-->
				<p align="right">
					<a href="tes_cetak/cetak_barang.php">
						<img src="images/printer.png" width="40" height="40">
					</a>
				</p>

			<!--membuat table inventaris-->
			<table class="tbl_form" id="data" width="60%" align="center" border="1">
			  <tr bgcolor='#f3f3f3'>
			    <th rowspan="2"><div align="center">Nama Barang</div></th> 
			    <th colspan="3"><div align="center">Kondisi</div></th>
				<th rowspan="2"><div align="center">Jumlah</div></th>
			  </tr>
			  <tr>
			    <th><div align="center">Baik</div></th>
			    <th><div align="center">Cukup Baik </div></th>
			    <th><div align="center">Rusak</div></th>
			  </tr>

			<!--menampilkan data-->
			<?php
				$kelompok = mysql_query("select sub_kategori, count(sub_kategori) from barang group by sub_kategori");
				while($k=mysql_fetch_array($kelompok)){
					$baik=mysql_num_rows(mysql_query("SELECT * FROM barang where sub_kategori='$k[0]' and kondisi = 'Baik'"));
					$cukup=mysql_num_rows(mysql_query("SELECT * FROM barang where sub_kategori='$k[0]' and kondisi = 'Cukup Baik'"));
					$rusak=mysql_num_rows(mysql_query("SELECT * FROM barang where sub_kategori='$k[0]' and kondisi = 'Rusak'"));			
				echo 	"<tr align='center'>
							<td>$k[0]</td>
							<td>$baik</td>
							<td>$cukup</td>
							<td>$rusak</td>
							<td>$k[1]</td>
						</tr>";
				}
			?>
				<tr align='center' bgcolor="#CCCCCC">
			    <td colspan="4"><div align="center">Jumlah Total</div></td>
				<td> 
			<!-- menampilkan jumlah total -->
			<?php
				$total = mysql_query("select count(sub_kategori) from barang");
				while($t=mysql_fetch_array($total)){
				echo $t[0];
			}
			?>
				</td>
			</tr>
		</table>