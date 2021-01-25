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
 	<h1 id="tekst">Promena smestaja pacijenata po sobama.</h1><br><br>
    <form class="forma" action="pretraga2.php" method="GET">
    	<label id="tekst">Unesite broj, sprat ili vrstu sobe:</label>
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




  <form action="pocetna.php">
	    <button type="submit"  class="dugme">Nazad</button>
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