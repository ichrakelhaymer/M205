```php
<?php

require_once 'comptebancaire.php';

$compte1 = new comptebancaire("123456", "ichrak", 2000);
$compte2 = new comptebancaire("789012", "ayoub", 1000);

echo $compte1 . "<br>";
echo $compte2 . "<br>";

$compte1->deposer(500);
echo "apres depot : " . $compte1 . "<br>";

$compte1->retirer(300);
echo "apres retrait : " . $compte1 . "<br>";

$compte1->virervers($compte2, 500);
echo "apres virement : <br>";
echo $compte1 . "<br>";
echo $compte2 . "<br>";

echo "nombre de comptes : " . comptebancaire::getnombrecomptes() . "<br>";

echo "numero valide : ";
echo comptebancaire::estnumerovalide("123456") ? "oui" : "non";

?>
