 
 <?php 
session_start ();
if (!isset ($_SESSION['korisnicko_ime'])){
    header ('Location:prijava.php');
}
?>	
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<div class="osnova">
 <header>
     	 <h1>Dobrodosli u bazu podatak Opste Bolnice "Laza Lazarevic".</h1>
     </header>
 </div>
<body>
<section>
     
    
 <div class="pretraga">
 	<h1 id="tekst">Pretraga baze o pacijentima.</h1><br><br>
 	<label id="tekst">Unesite ime ili prezime:</label>
     <form class="forma" action="pretraga.php" method="GET">
	    <input type="text" name="pretraga" placeholder="..." id="unos"><br><br><br>
	    <button type="submit" id="pretraga_dugme">Pretraži</button><br><br>
 
	    
    </form>
    </div>
      </section>
    
 <div class="osnova"></div>
   <footer>
    
  
 <form action="odjava.php">
	    <button type="submit"  class="odjava">Odjava</button>
	    </form>


<form action="pocetna2.php">
	    <button type="submit"  class="dugme">Izmena</button>
	    </form>  

  <form action="izmbris.php">
	    <button type="submit"  class="dugme">Brisanje</button>
	    </form>  

	     <form action="otpremanje.php">
	    <button type="submit"  class="otpremanje">Otpremi</button>
	    </form>  
</body>
</body>
</div>
   </footer>
</div>
</html>