<?php
error_reporting(E_ALL^E_NOTICE);
include "koneksi.php"; // menghubungkan ke file koneksi.php agar terhubung dengan database
$nomor = $_GET['nomor'];
$delete = "delete from barang where nomor='$nomor' ";
mysql_query($delete);

$sql="select*from barang";
$query=mysql_query($sql);
?>


<article class="module width_full">
  <header><h3>Data Barang</h3></header>
  <div  class="module_content">
    <table class="tbl_form" border="0">
      <tr>
        <td>
        <?php  
            if ($_SESSION['status']=="Admin") {
              echo "<a href='?page=i_barang'><input type='submit' value='Tambah Barang' id='tombol'></a>";
            }
          ?>
        </td>
        <td align="right" width="66%">
          <form action="" method="post">
            <input type="text" name="input_cari" placeholder="Cari Nama Barang / Lokasi">
            <input type="submit" name="cari" value="Cari" id="tombol">
          </form>
        </td>
        <td align="right">
          <a href="tes_cetak/cetak_barang.php">
              <img src="images/printer.png" width="40" height="40">
            </a>
        </td>
      </tr>
    </table>

    <br>

   <table border="1" class="tbl_form" id="data">
    <tr>
     <th>Kode Barang</th>
     <th>Kategori</th>
     <th>Nama Barang</th>
     <th>Merk</th>
     <th>Kondisi</th>
     <th>Spesifikasi</th>
     <th>Lokasi</th>
     <th>Status</th>
     <th>Aksi</th>
    </tr>
   <?php 

   $input_cari = @$_POST['input_cari']; 
   $cari = @$_POST['cari'];

   // jika tombol cari di klik
  if($cari) {

      // jika kotak pencarian tidak sama dengan kosong
      if($input_cari != "") {
      // query mysql untuk mencari berdasarkan nama barang / lokasi
        $sql = mysql_query("SELECT * from barang where lokasi like '%$input_cari%' or sub_kategori like '%$input_cari%'  ") or die (mysql_error());   
      } else {
        $sql = mysql_query("SELECT * from barang ") or die (mysql_error());
      }
  } else {
      $sql = mysql_query("select * from barang") or die (mysql_error());
  }

   // mengecek data
   $cek = mysql_num_rows($sql);
  // jika data kurang dari 1
  if($cek < 1) {
    ?>
     <tr> <!--muncul peringata bahwa data tidak di temukan-->
      <td colspan="7" align="center style="padding:10px;""> Data Tidak Ditemukan</td>
     </tr>
    <?php
  } else {
   // mengulangi data agar tidak hanya 1 yang tampil
   while($data = mysql_fetch_array($sql)) {

   ?>
   <tr align="center">
    <td><?php echo $data['kode_gabung'] ?></td>
    <td><?php echo $data['kategori'] ?></td>
    <td><?php echo $data['sub_kategori'] ?></td>
    <td><?php echo $data['merk'] ?></td>
    <td><?php echo $data['kondisi'] ?></td>
    <td><?php echo $data['spesifikasi'] ?></td>
    <td><?php echo $data['lokasi'] ?></td>
    <td><?php echo $data['status_barang'] ?></td>
    
    <!--Hanya pemanis tampilan-->
    <td align="center">
      <?php

          if ($_SESSION['status']=="Admin") {
          echo "<a href='?page=edit_b&update=$data[4]'><img src='images/edit.png' width='30' height='30'></a>
            <a href='?page=delete_b&id_ruang=$data[4]'><img src='images/delete.png' width='30' height='30'></a>
            <a href='tes_cetak/cetak_barang_id.php'>
              <img src='images/printer.png' width='30' height='30'>
            </a>";
        }
          ?>
    </td>
   </tr>
  <?php 

  } 
 }
?>
 </table>
  </div>
</article>