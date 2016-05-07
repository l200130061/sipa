<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$update=$_GET['update'];

$sql="SELECT * FROM `user` WHERE `id_user` = '$update' ";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
?>

<article class="module width_full">
	<header><h3>Edit Data Akun</h3></header>
	<div class="module_content">
		<form method="post" action="?page=edit_u&update=<?php echo $update;?>">
			<table class="tbl_form">
				
				<tr>
					<td width="20%">Identitas</td>
					<td>:</td>
					<td><input type='text' name='id_user' value='<?php echo $row[id_user] ?>'></td>
				</tr>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type='text' name='username' value='<?php echo $row[username] ?>' size='40'></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select name="status"><option><?php echo $row[status]; ?></option>}
						
						<option value="Admin">Admin</option>
						<option value="User">User</option>
					</select>
				</tr>
				<tr align="right">
					<td></td>
					<td></td>
					<td><input id="tombol" type="submit" name="submit" value="Simpan"></td>
				</tr>
			</table>
		</form>
<?php
$id_user=$_POST['id_user'];
$username=$_POST['username'];
$status=$_POST['status'];
$submit=$_POST['submit'];
if ($submit) {
	$sql = "UPDATE user set id_user='$id_user' , username='$username', status='$status' where id_user='$update' ";
	mysql_query($sql);
	?>
			<script language script="JavaScript">
			alert('Data Berhasil Diedit');
			document.location='?page=user';
			</script>	
			<?php

}
?>
	</div>
</article>
