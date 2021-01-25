<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
  
<body>
 <?php session_start();?>
<div class="prijava">
<h1>Prijava:</h1>
<form action="validacija.php" method="post">
	<lable> Korisnicko ime:</lable><br>
	<input type="text" id="kime" name="korisnicko_ime" title="Unesite korisnicko ime:"><br><br>
	 <lable>Lozinka:</lable><br>
	<input type="password"   name="lozinka" id="Loznka" title="Unesite lozinku:" required><br><br>
	 <input type="submit" class="button" value="Prijavite se" >
	<input type="reset" class="button" value="Resetuj vrednosti">
	</form>
</div>

<img src="hospital.png" class="hospital" id="icon">

 	<div class="registracija">

<h1>Regitracija:</h1>
<form action="registar.php" method="post">
	<lable> Korisnicko ime:</lable><br>
	<input type="text" id="kime" name="korisnicko_ime" title="Unesite korisnicko ime:"><br><br>
	<lable>Email:</lable><br>
	<input type="email" id="email" name="email" title="Unesite email:"><br><br>
	<lable>Lozinka:</lable><br>
	<input type="password" name="lozinka" required id="Loznka" title="Unesite lozinku:">
	<br><br>
	<lable> Ime:</lable><br>
	<input type="text" id="ime" name="ime" title="Unesite ime:"><br><br>
	<lable>Prezime:</lable><br>
	<input type="text" id="prezime" name="prezime" title="Unesite prezime:"><br><br>
	 <input type="submit" class="button" value="Registrujte se" >
	<input type="reset" class="button" value="Resetuj vrednosti"><br>
 
	</form>
</div>

</body>
 
 </html>