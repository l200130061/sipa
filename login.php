<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
include "koneksi.php";

@$username = $_POST['username'];
@$password = $_POST['password'];
@$submit = $_POST['submit'];

if($submit)
	{
	$sql = "select * from user where username='$username' and password='$password' ";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	if($row['username']!=""){
		//berhasil login
		$_SESSION['username']=$row['username'];
		$_SESSION['status']=$row['status'];
	?>
			<script language script="JavaScript">
			alert('Anda Login Sebagai <?php echo $row['status']; ?>');
			document.location='index.php';
			</script>	
	<?php
		
	}else{
		//gagal login
			?>
			<script language script="JavaScript">
			alert('Gagal Login');
			document.location='login.php';
			</script>	
		<?php

	}
}
?>


<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8"/>

	<title>Aplikasi Sistem Informasi Manajemen Aset Sekolah</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title">SIPA | FKI</h1>
			<h2 class="section_title">Laboratorium Program Studi Informatika UMS</h2>
			
		</hgroup>
	</header>
	
	<center>

		<article class="module kotak">
			<div class="module_content">
				<img src="images/login1.png">
			<form method="post" action="login.php">
				<h1>Log In</h1>
				<hr><br>
				<table class="tbl_form">
					<tr>
						<td align='right' width="39%">Username</td>
						<td align='center' width='4%'>:</td>
						<td><input type="text" name="username" size="20" placeholder="Username"></td>
					</tr>
					<tr>
						<td align='right'>Password</td>
						<td align='center'>:</td>
						<td><input type="password" name="password" size="20" placeholder="Password"></td>
					</tr>
					<tr align='left'>
						<td></td>
						<td></td>
						<td><input id="tombol" type="submit" name="submit" value="Login"></td>
					</tr>
				</table>
			</form>
			</div>
		</article>
	
	</center>

</body>

</html>