<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title> Sistem Informasi Peminjaman dan Aset</title>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/ie.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/jquery-latest.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
	<script src="js/chain/jquery.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/chain/jquery.chained.js" type="text/javascript" charset="utf-8"></script>
	<script>
	$(document).ready(function()
		{
			$("#myTable").tablesorter();
		}
	);

	</script>
</head>

<body>

	<!-- start of header bar -->
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="?page=home">SIPA | FKI</a></h1>
			<h2 class="section_title"> Laboratorium Program Studi Informatika UMS</h2>
			<h6 class="alamat">Jalan Ahmad Yani Tromol Pos 1 Pabelan Kartasura, Surakarta. Telp.717417</h6>
		</hgroup>
	</header> 
	<!-- end of header bar -->

	<!-- awal second header -->	
	<section id="secondary_bar">
		<div class="user">
			<?php 
			session_start();
			error_reporting(E_ALL^E_NOTICE);
			$status=$_GET['status'];
			$sql = "SELECT*from user";
				if ($_SESSION['status']=="Admin") {
					echo "<p>Admin</p>";
				}else{
					echo "<p>User</p>";
				}
			?>
		</div>
		<div class="breadcrumbs_container">
			<!--<article class="breadcrumbs"><a href="index.php">SIPA|FKI</a>
				<div class="breadcrumb_divider"></div> <a class="current">aaa</a>
			</article>-->
		</div>
	</section>
	<!-- akhir second header -->
	
	<!--menu sidebar-->
	<aside id='sidebar' class='column'>
		
		<?php
		error_reporting(E_ALL^E_NOTICE);
		$username = $_GET['username'];
		$page = $_GET['page'];

		if ($_SESSION['status']=="Admin") {
			echo "<hr>
				<h3>Input</h3>
				<ul class='toggle'>
					<li class='icn_new_article'><a href='?page=i_barang'>Data Barang</a></li>
					<li class='icn_new_article'><a href='?page=i_ruang'>Data Ruang</a></li>
					<li class='icn_new_article'><a href='?page=i_pinjam'>Data Peminjaman</a></li>
					<li class='icn_new_article'><a href='?page=i_dosen'>Data Dosen / Staff</a></li>
				</ul>
				<hr>
				<h3>Laporan</h3>
				<ul class='toggle'>
					<li class='icn_categories'><a href='?page=barang'>Data Barang</a></li>
					<li class='icn_categories'><a href='?page=ruang'>Data Ruang</a></li>
					<li class='icn_categories'><a href='?page=peminjaman'>Data Peminjaman</a></li>
					<li class='icn_categories'><a href='?page=kategori'>Data Kategori</a></li>
					<li class='icn_categories'><a href='?page=sub_kategori'>Data sub Kategori</a></li>
					<li class='icn_categories'><a href='?page=dosen'>Data Dosen / Staff</a></li>
				</ul>
				<hr>
				<h3>Manajemen</h3>
				<ul class='toggle'>
					<li class='icn_folder'><a href='?page=inventaris'>Barang</a></li>
					<li class='icn_folder'><a href='?page=#'>Ruang</a></li>
					<li class='icn_profile'><a href='?page=user'>User dan Admin</a></li>
					<li class='icn_edit_article'><a href='?page=ttd'>Tanda Tangan</a></li>
				</ul>
				<hr>
				<h3>Pengguna</h3>
				<ul class='toggle'>
					<li class='icn_edit_article'><a href='?page=ubah_pass'>Ubah Password</a></li>
				</ul>
				<ul class='toggle'>
					<li class='icn_jump_back'><a href='logout.php'>Logout</a></li>
				</ul>";

		}else if ($_SESSION['status']=="User") {
			echo"<hr><h3>Formulir</h3>
				<ul class='toggle'>
					<li class='icn_new_article'><a href='?page=u_pinjam'>Peminjaman Barang</a></li>
				</ul>
				<hr>
				<h3>Inventaris</h3>
				<ul class='toggle'>
					<li class='icn_categories'><a href='?page=barang'>Data Barang</a></li>
					<li class='icn_categories'><a href='?page=ruang'>Data Data Ruang</a></li>
					<li class='icn_categories'><a href='?page=i_pinjam'>Peminjaman Saya</a></li>
				</ul>
				<hr>
				<h3>Pengaturan</h3>
				<ul class='toggle'>
					<li class='icn_edit_article'><a href='?page=ttd'>Tanda Tangan</a></li>
				</ul>
				<hr>
				<h3>Pengguna</h3>
				<ul class='toggle'>
					<li class='icn_edit_article'><a href='?page=ubah_pass'>Ubah Password</a></li>
				</ul>
				<ul class='toggle'>
					<li class='icn_jump_back'><a href='logout.php'>Logout</a></li>
				</ul>"
				;
		}else{
			/*echo "<hr><h3>Pengguna</h3>
				<ul class='toggle'>
					<li class='icn_jump_in'><a href='login.php'> Login</a></li>
				</ul>";*/
				?>
				<script language script="JavaScript">
					alert('Anda Harus Login Dulu.');
					document.location='login.php';
			</script>	
				<?php
		}
		?>

		<!--footer-->
		<footer>
			<hr><hr>
			<p><strong>SIPA 1.0</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">KP-2016</a></p>
		</footer>
	</aside>

	<!-- isi konten/artikel -->
	<section id="main" class="column">
		<?php include 'case.php'; ?>
	</section>

</body>

</html>