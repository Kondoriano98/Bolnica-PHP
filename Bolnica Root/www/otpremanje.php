 <?php 
session_start ();
if (!isset ($_SESSION['korisnicko_ime'])){
    header ('Location:prijava.php');
}
?>
 <!DOCTYPE html>
 <html>
 <head>
    <link rel="stylesheet" type="text/css" href="stylee5.css">
     <title></title>
 </head>
 <header id="naslov">Izaberite zeljenu fotografiju:</header>
 <body>

    <form action="otpremanje2.php" method="post" enctype="multipart/form-data" class="otpremanje">
        <label id="tekst">Izaberi sliku za otpremanje:</label>
        <input class="select" type="file" name="podatak" id="fileToUpload">
        <input id="upload" type="submit" value="Otpermi" name="submit" class="dugmad_otpremanje">
    </form>

        <?php 
    $folder = "slike/";
$slike = glob($folder."*.png");
foreach($slike as $slika) {
    echo '<img src="'.$slika.'" width = "100" height = "280" class="slike">';
}
    ?>


 </body>
 </html>

 


  