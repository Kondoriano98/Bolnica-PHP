  <?php
  error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED );
  ?>
  <?php 
session_start ();
if (!isset ($_SESSION['korisnicko_ime'])){
    header ('Location:prijava.php');
}
?>
 <html>
<head>
	
</head>
<link rel="stylesheet" type="text/css" href="stylee4.css">
<header>
	<h1>Prikazani reluztati:</h1>
</header>
<?php 
$connect = mysqli_connect('localhost','root', '');
mysqli_select_db($connect, 'bolnica' );
$pretraga = $_GET['pretraga'];
$upitIme = "SELECT hirurg.id, hirurg.korisnicko_ime, hirurg.email, hirurg.lozinka, hirurg.ime, hirurg.prezime
FROM hirurg 
WHERE (hirurg.ime LIKE '$pretraga%') OR (hirurg.prezime LIKE '$pretraga%')";
$rezultat = mysqli_query($connect, $upitIme);
$provera=$provera = mysqli_num_rows ($rezultat);
if($provera>0){
?>
					 

<form action="." method="POST">
</form>
<table border="1">
	<tr>
		<th>ID</th>
		<th>korisnicko_ime</th>
		<th>email</th>
		<th>lozinka</th>
		 
		<th>ime</th>
		<th>prezime</th>
		<th>izmeni</th>
		 
	</tr>
	<?php 
		while($red = mysqli_fetch_array($rezultat)){
		?>
				<tr>
					<td><?php echo $red["id"]; ?></td>
					<td><?php echo $red["korisnicko_ime"]; ?></td>
					<td><?php echo $red["email"]; ?></td>
					<td><?php echo $red["lozinka"]; ?></td>
					 <td><?php echo $red["ime"]; ?></td>
					 <td><?php echo $red["prezime"]; ?></td>

					 

					 <td><a href='izmeni2.php?id=<?php echo $red["id"];?> '>Izmeni</a> </td>
					 
				</tr>


					
					
				</tr>
			<?php
		}
		}
		else{
			echo "Pretraga ne prikazuje rezultate!";
		}
	?>
</table>
<form action="pocetna2.php">
	<button type="submit" id="nazad">Nazad</button>
</body>
</html>