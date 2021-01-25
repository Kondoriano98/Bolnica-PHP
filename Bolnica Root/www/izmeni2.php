 <?php 
session_start ();
if (!isset ($_SESSION['korisnicko_ime'])){
    header ('Location:prijava.php');
}
?>

 <?php 
	 $connect = mysqli_connect('localhost','root','');
	mysqli_select_db($connect, 'bolnica' );

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$upit=(" SELECT hirurg.id, hirurg.korisnicko_ime, hirurg.email, hirurg.lozinka, hirurg.ime, hirurg.prezime
FROM hirurg 
		WHERE id='$id'");
		$rezultat=mysqli_query($connect, $upit);
		$red=mysqli_fetch_array($rezultat);
	
	}
	if(isset($_POST['novaLozinka']))
	{
		$id=$_POST['id'];
		$novoKorisnico_ime=$_POST['novoKorisnico_ime'];
	  $noviEmail=$_POST['noviEmail'];
	  $novaLozinka=$_POST['novaLozinka'];
	  $novoIme=$_POST['novoIme'];
	  $novoPrezime=$_POST['novoPrezime'];
	 	

	
         
		 
		if (!ctype_alpha($novoIme) )
		{
			header("refresh:10;url=pocetna.php");
			echo '<script language="javascript">';
			echo 'alert("Niste uneli dobre podatke.")';
			echo '</script>';
			exit;
		}
		else{
			mysqli_query($connect, "UPDATE hirurg
			   SET korisnicko_ime='$novoKorisnico_ime', email='$noviEmail', lozinka='$novaLozinka', ime='$novoIme', prezime='$novoPrezime'  
			WHERE id='$id'");
			header("refresh:5;url=pocetna.php");	
			echo '<script language="javascript">';
			echo 'alert("Uspesno ste izmenili podatke.Bicete prebaceni na pocetnu stranu! ")';
			echo '</script>';
			exit;
		}			
	}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style6.css">	
</head>
</head>
<header><h1 id="naslov">Ukucajte zeljene vrednosti za izmenu:</h1></header>
	<body>
<form id="forma" action="izmeni2.php" method="POST">
<input type="hidden" name="id" value="<?php echo $red[0]; ?>" >
<label>   </label><br>
 <input id="broj" type="hidden" name="novoKorisnico_ime"  value="<?php echo $red[1]; ?>"   ><br><br>
 <label> Unesite novi e-mail:</label><br>
 <input id="broj" type="text" name="noviEmail"  value="<?php echo $red[2]; ?>"  ><br><br>
  <label> Unesite novu lozinku:</label><br>
 <input id="broj" type="text" name="novaLozinka"  value="<?php echo $red[3]; ?>"><br><br>
  <br><br>
  <label> </label><br>
 <input id="broj" type="hidden" name="novoIme"  value="<?php echo $red[4]; ?>"  ><br><br>
 <label>  </label><br>
 <input id="broj" type="hidden" name="novoPrezime"  value="<?php echo $red[5]; ?>"  ><br><br>
<input id="izmeni" type="submit" value="Potvrdi">
</form>



   


 
</body>
</html>