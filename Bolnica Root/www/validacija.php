<?php
session_start();
$connect = mysqli_connect('localhost','root', '');
mysqli_select_db($connect, 'bolnica');
$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];
$upit = "SELECT * FROM hirurg WHERE korisnicko_ime='$korisnicko_ime' && lozinka= '$lozinka'";
$rezultat = mysqli_query($connect, $upit);
$provera = mysqli_num_rows ($rezultat);
if ($provera == 1) {
	$_SESSION ['korisnicko_ime'] = $korisnicko_ime;
	header('Location:pocetna.php');
}
else {
	header("refresh:0;url=prijava.php"); 
	echo '<script language="javascript">';
	echo 'alert("Uneli ste pogrešno korisničko ime ili lozinku. Pokušajte ponovo!")';
	echo '</script>';
	exit;
}
?>