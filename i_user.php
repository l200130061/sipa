<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$id_user=$_POST['id_user'];
$username=$_POST['username'];
$password=$_POST['password'];
$status=$_POST['status'];
$submit=$_POST['submit'];

if($submit){
	$sql="INSERT into user (id_user,username,password,status) values ('$id_user','$username','$password','$status')";
	mysql_query($sql);
	?>
	<script language script="JavaScript">
			alert('Data Berhasil Ditambahkan.');
			document.location='?page=user';
			</script>	
			<?php
}
?>

<article class="module width_full">
	<header><h3>Input Data User</h3></header>
	<div class="module_content">

<form method="post">
<table class="tbl_form">
				<tr>
					<td width="20%">ID User</td>
					<td>:</td>
					<td><input type="text" name="id_user" placeholder="Identitas">
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" placeholder="Nama User" size="40">
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" placeholder="Password" size="40"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select name="status">
							<option value="">Status</option>
							<option value="Admin">Admin</option>
							<option value="User">User</option>
						</select></td>
				</tr>
				<tr align="right">
					<td></td>
					<td></td>
					<td><input id="tombol" type="submit" name="submit" value="Tambahkan"></td>
				</tr>
			</table>
</form>

	</div>
</article>