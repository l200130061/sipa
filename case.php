<?php
error_reporting(E_ALL^E_NOTICE);
switch ($page) {

	case 'search'		: include 'coba.php';
		break;

	//home
	case 'home'			: include 'beranda.php';
		break;

	//input
	case 'i_barang'		: include 'i_barang.php';
		break;
	case 'i_ruang'		: include 'i_ruang.php';
		break;
	case 'i_user'		: include 'i_user.php';
		break;
	case 'i_pinjam'		: include 'i_pinjam.php';
		break;
	case 'i_kategori'	: include 'i_kategori.php';
		break;
	case 'i_subkategori': include 'i_subkategori.php';
		break;
	case 'i_dosen'		: include 'i_dosen.php';
		break;
	case 'u_pinjam'		: include 'u_pinjam.php';
		break;

	//view
	case 'barang'		: include 'barang.php';
			break;
	case 'ruang'		: include 'ruang.php';
		break;
	case 'inventaris'	: include 'data_barang.php';
		break;
	case 'kategori'		: include 'kategori.php';
		break;
	case 'sub_kategori'	: include 'sub_kategori.php';
		break;
	case 'peminjaman'	: include 'peminjaman.php';
		break;
	case 'user'			: include 'user.php';
		break;
	case 'ttd'			:include 'ttd.php';
		break;
	case 'dosen'		: include 'dosen.php';
		break;

	//edit
	case 'edit_b'		: include 'edit_barang.php';
		break;
	case 'edit_r'		: include 'edit_ruang.php';
		break;
	case 'edit_k'		: include 'edit_kategori.php';
		break;
	case 'edit_s'		: include 'edit_subkategori.php';
		break;
	case 'edit_p'		: include 'edit_pinjam.php';
		break;
	case 'edit_u'		: include 'edit_user.php';
		break;
	case 'ubah_pass'	: include 'ubah_pass.php';
		break;
	case 'edit_d'		: include 'edit_dosen.php';
		break;

	//delete
	case 'delete_b'		: include 'barang.php';
			break;
	case 'delete_r'		: include 'ruang.php';
		break;
	case 'delete_k'		: include 'kategori.php';
		break;
	case 'delete_s'		: include 'sub_kategori.php';
		break;
	case 'delete_d'		: include 'dosen.php';
		break;


	//cetak
	

	//logout
	case 'logout'		: include 'login.php';
		break;

	//default
	default 			: include 'beranda.php';
		break;
}
?>