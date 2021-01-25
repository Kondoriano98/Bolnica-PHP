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
$upitIme = "SELECT soba.id, soba.broj, soba.sprat, soba.vrsta
FROM soba 
WHERE (soba.broj LIKE '$pretraga%') OR (soba.sprat LIKE '$pretraga%') OR (soba.vrsta LIKE '$pretraga%')  ";
$rezultat = mysqli_query($connect, $upitIme);
$provera=$provera = mysqli_num_rows ($rezultat);
if($provera>0){
?>
					 

<form action="." method="POST">
</form>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Broj Sobe</th>
		<th>Sprat</th>
		<th>Vrsta</th>
		 
		<th>Izbrisi</th>
		 
		
		 
	</tr>
	<?php 
		while($red = mysqli_fetch_array($rezultat)){
		?>
				<tr>
					<td><?php echo $red["id"]; ?></td>
					<td><?php echo $red["broj"]; ?></td>
					<td><?php echo $red["sprat"]; ?></td>
					<td><?php echo $red["vrsta"]; ?></td>
					 
					 

					 

					 
					<td><a href='brisanje.php?id=<?php echo $red["id"];?>' onclick="return confirm('Da li ste sigurni da želite da obrišete?')">Izbrisi</a></td>
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
<form action="izmbris.php">
	<button type="submit" id="nazad">Nazad</button>
</body>
</html>