<?php
$folder = "slike/";
$fajl = $folder . basename($_FILES["podatak"]["name"]);
$provera = 1;
$tipslike = strtolower(pathinfo($fajl,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $proveri = getimagesize($_FILES["podatak"]["tmp_name"]);
    if($proveri !== false) {
        echo "Fajl je slika - " . $proveri["mime"] . ".";
        $provera = 1;
    } else {
        echo "Fajl nije slika!";
        $provera = 0;
    }
}
if (file_exists($fajl)) {
    echo "Fajl je već ubačen!";
    $provera = 0;
}
if ($_FILES["podatak"]["size"] > 500000) {
    echo "Fajl je prevelik!";
    $provera = 0;
}
if($tipslike != "png") {
    echo "Možete ubaciti samo png fajlove!";
    $provera = 0;
}
if ($provera == 0) {
    echo "Fajl nije otpremljen!";
} else {
    if (move_uploaded_file($_FILES["podatak"]["tmp_name"], $fajl)) {
        echo "Fajl: *". basename( $_FILES["podatak"]["name"]). "* je uspešno otpremljen!";
    } else {
        echo "GREŠKA! Fajl nije otpremljen!";
    }
}
?>

