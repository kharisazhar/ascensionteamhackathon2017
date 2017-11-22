<?php
$db = mysqli_connect('localhost','root','','tani');
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal, Error 404:".mysqli_connect_errno();
  die();
}
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/assets/config.php';
require_once BASEURL.'helpers.php';

$cart_id = '';
if (isset($_COOKIE[CART_COOKIE])) {
	$cart_id = sanitize($_COOKIE[CART_COOKIE]);
}


if (isset($_SESSION['tani'])) {
	$user_id = $_SESSION['tani'];
	$query = $db->query("SELECT * FROM users WHERE id = '$id'");
	$user_data = mysqli_fetch_assoc($query);
	$fn = explode(' ', $user_data['full_name']);
	$user_data['first'] = $fn[0];
	$user_data['last'] = $fn[1];
}

if(isset($_SESSION['success_flash'])){
	echo '<div class="bg-success"><p class="text-success text-center">'.$_SESSION['success_flash'].'</p></div>';
	unset($_SESSION['success_flash']);
}

if(isset($_SESSION['error_flash'])){
	echo '<div class="bg-danger"><p class="text-danger text-center">'.$_SESSION['error_flash'].'</p></div>';
	unset($_SESSION['error_flash']);
}
