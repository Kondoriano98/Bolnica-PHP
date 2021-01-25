 <?php
session_start();
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect, 'bolnica' );
$korisnicko_ime=$_POST['korisnicko_ime'];
$email=$_POST['email'];
$lozinka = $_POST['lozinka'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$upit = "SELECT * FROM hirurg WHERE korisnicko_ime='$korisnicko_ime'";
$rezultat = mysqli_query($connect, $upit);
$provera = mysqli_num_rows ($rezultat);
if ($provera == 1) {
	header("refresh:0;url=prijava.php");	
	echo '<script language="javascript">';
	echo 'alert("Korisničko ime već postoji.")';
	echo '</script>';
	exit;
}
else if (!ctype_alpha($ime)){
	header("refresh:0;url=prijava.php");
	echo '<script language="javascript">';
	echo 'alert("Unesite ispravno ime.")';
	echo '</script>';
	exit;
	}
else if (!ctype_alpha($prezime)){
	header("refresh:0;url=prijava.php");
	echo '<script language="javascript">';
	echo 'alert("Unesite ispravno prezime.")';
	echo '</script>';
	exit;
	}
else if (strlen($lozinka)<6){
	header("refresh:0;url=prijava.php");
	echo '<script language="javascript">';
	echo 'alert("Lozinka mora da ima minumum 6 karaktera.")';
	echo '</script>';
	exit;
	}
	else if (strlen($korisnicko_ime)>10){
	header("refresh:0;url=prijava.php");
	echo '<script language="javascript">';
	echo 'alert("Korisnicko ime ne sme biti duze od 10 karaktera.")';
	echo '</script>';
	exit;
	}



else {
	$registracija = "INSERT INTO hirurg (korisnicko_ime,email,lozinka,ime,prezime) VALUES('$korisnicko_ime','$email','$lozinka','$ime','$prezime')";
	mysqli_query ($connect, $registracija);
	header("refresh:0;url=prijava.php"); 
	echo '<script language="javascript">';
	echo 'alert("Uspešno ste se registrovali.")';
	echo '</script>';
	exit;
}
?>