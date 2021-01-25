<?php 
session_start ();
if (!isset ($_SESSION['korisnicko_ime'])){
    header ('Location:prijava.php');
}
?>
<html>
<head>
	
</head>
<link rel="stylesheet" type="text/css" href="style3.css">
<header>
	<h1>Prikazani reluztati:</h1>
</header>
<?php 
 
$connect = mysqli_connect('localhost','root', '');
mysqli_select_db($connect, 'bolnica' );
$pretraga = $_GET['pretraga'];
$upitIme = "SELECT pacijent.id, pacijent.ime, pacijent.prezime, pacijent.adresa, pacijent.soba_id, soba.broj, soba.sprat, soba.vrsta, konzumira.trajanje_konzumacije, konzumira.lek_id, operacija.datum, operacija.hirurg_id
FROM pacijent 
INNER JOIN soba ON pacijent.soba_id=soba.id
INNER JOIN konzumira ON konzumira.pacijent_id=pacijent.id  
INNER JOIN operacija ON operacija.pacijent_id=pacijent.id 
WHERE (pacijent.ime LIKE '$pretraga%') OR (pacijent.prezime LIKE '$pretraga%')";
$rezultat = mysqli_query($connect, $upitIme);
$provera=$provera = mysqli_num_rows ($rezultat);
if($provera>0){
?>
					 

<form action="." method="POST">
</form>
<table border="1">
	<tr>
		<th>ID</th>
		<th>ID_Sobe</th>
		<th>Ime</th>
		<th>Prezime</th> 
		<th>Sprat sobe</th>
		<th>Broj sobe</th>
	    <th>Vrsta sobe</th>
   		<th>Adresa</th>
		<th>Trajanje terapije</th>
		<th>Lek_id</th>
		<th>Datum Operacije</th>
		<th>ID_Hirurga</th>
	 
		  
	</tr>
	<?php 
		while($red = mysqli_fetch_array($rezultat)){
		?>
				<tr>
					<td><?php echo $red["id"]; ?></td>
					<td><?php echo $red["soba_id"]; ?></td>
					<td><?php echo $red["ime"]; ?></td>
					<td><?php echo $red["prezime"]; ?></td>
					<td><?php echo $red["sprat"]; ?></td>
					<td><?php echo $red["broj"]; ?></td>
					<td><?php echo $red["vrsta"]; ?></td>
					<td><?php echo $red["adresa"]; ?></td>
					<td><?php echo $red["trajanje_konzumacije"]; ?></td>
					<td><?php echo $red["lek_id"]; ?></td>
					<td><?php echo $red["datum"]; ?></td>
					<td><?php echo $red["hirurg_id"]; ?></td>
					 

       


					
					
				</tr>
			<?php
		}
		}
		else{
			echo "Pretraga ne prikazuje rezultate!";
		}
	?>
</table>
<form action="pocetna.php">
	<button type="submit" id="nazad">Nazad</button>
</form>
</body>
</html>