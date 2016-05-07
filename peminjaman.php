<?php  
error_reporting(E_ALL^E_NOTICE);
include 'koneksi.php';

$id_pinjam = $_GET['id_pinjam'];
$delete = "DELETE from pinjam where id_pinjam=$id_pinjam"


?>

<article class="module width_full">
  <header><h3>Data Peminjaman Barang</h3></header>
  <div class="module_content">
    <table class="tbl_form">
        <tr>
          <td>
            <?php  
            if ($_SESSION['status']=="Admin") {
              echo "<a href='?page=i_pinjam'><input type='submit' value='Tambah Peminjaman' id='tombol'></a>";
            }else{
              echo "<a href='?page=u_pinjam'><input type='submit' value='Tambah Peminjaman' id='tombol'></a>";
            }
            ?>
          </td>
          <td align="right" width="66%">
            <form action="" method="post">
              <input type="text" name="input_cari" placeholder="Status Peminjam / Nama Barang" size="25">
              <input type="submit" name="cari" value="Cari" id="tombol">
            </form>
          </td>
          </td>
          <td align='right'>
            <a href="tes_cetak/cetak_peminjaman.php">
              <img src="images/printer.png" width="40" height="40">
            </a>
          </td>
        </tr>
      </table><br>
      <table border='1' class="tbl_form" id="data">
        <tr>
          <input type='hidden'><?php $row[4]?>
          <th>No.</th>
          <th>ID Peminjam</th>
          <th>Nama</th>
          <th>Status Peminjam</th>
          <th>Telp.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Tgl. Pinjam</th>
          <th>Tgl. Kembali</th>
          <th>Status</th>
          <?php 
            if ($_SESSION['status']=="Admin") {
              echo "<th>Aksi</th>";
            }
          ?>
        </tr>
        <?php 

         $input_cari = @$_POST['input_cari']; 
         $cari = @$_POST['cari'];

         // jika tombol cari di klik
        if($cari) {

            // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
            // query mysql untuk mencari berdasarkan nama barang / lokasi
              $sql = mysql_query("SELECT * from pinjam where status_peminjam like '%$input_cari%' or nama_barang like '%$input_cari%'  ") or die (mysql_error());   
            } else {
              $sql = mysql_query("SELECT * from pinjam ") or die (mysql_error());
            }
        } else {
            $sql = mysql_query("select * from pinjam") or die (mysql_error());
        }

        //mengecek data
        $cek = mysql_num_rows($sql);
        //jika data kurang dari 1
        if ($cek < 1) {
          ?>
            <!--menampilkan pemberitahuan-->
            <tr>
              <td colspan="11">Data Tidak Ditemukan</td>
            </tr>
          <?php
        }else {
          //pengulangan menampilkan data
          while ($data = mysql_fetch_array($sql)) {
            $no=1;
            ?>
              <tr align="center">
                <td><?php echo $no; ?></td>
                <td><?php echo $data[nim] ?></td>
                <td><?php echo $data[nama_peminjam] ?></td>
                <td><?php echo $data[status_peminjam] ?></td>
                <td><?php echo $data[nomor_telp] ?></td>
                <td><?php echo $data[kode_gabung] ?></td>
                <td><?php echo $data[nama_barang] ?></td>
                <td><?php echo $data[tgl_pinjam] ?></td>
                <td><?php echo $data[tgl_kembali] ?></td>
                <td>
                  <?php
                  if ($data[status_barang]=='Tersedia') {
                    echo "<button type='button' value='tersedia' id='tersedia'>Tersedia</button>";
                  }else{
                    echo "<button type='button' value='dipinjam' id='dipinjam'>Dipinjam</button>";
                  }
                  ?>
                </td>
                <!--ikon edit, delete, cetak-->
                <td align="center">
                  <?php
                    if ($_SESSION['status']=="Admin") {
                      echo "<a href='?page=edit_p&update=$row[0]'><img src='images/edit.png' width='30' height='30'></a>
                      <a href='tes_cetak/#'>
                        <img src='images/printer.png' width='30' height='30'>
                      </a>";
                    }
                  ?>
                </td>
              </tr>
            <?php
            $no++;
          }
        }

        ?>
  </div>
</article>