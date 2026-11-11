<?php
declare(strict_types=1);

require_once __DIR__ . "/CompteBancaire.php";
require_once __DIR__ . "/CompteEpargne.php";
require_once __DIR__ . "/CompteCourant.php";
require_once __DIR__ . "/Banque.php";

$compte1 = new CompteEpargne(
    "CB000001",
    "Sara Alami",
    2000,
    3
);

$compte2 = new CompteCourant(
    "CB000002",
    "Omar Benani",
    800,
    1000
);

$comptes = [$compte1, $compte2];

foreach ($comptes as $compte) {
    echo $compte . "<br>";
}

function tenterRetrait(CompteBancaire $compte, float $montant): void
{
    try {
        $compte->retirer($montant);

        echo "Retrait de " . $montant . " accepté : ";
    } catch (InvalidArgumentException $e) {
        echo "Retrait de " . $montant . " refusé : ";
    }

    echo number_format($compte->getSolde(), 2) . " MAD<br>";
}

echo "<h3>Créditer les intérêts</h3>";

$compte1->ajouterInterets();

echo "Intérêts crédités : " .
    number_format($compte1->calculerInterets(), 2) . " MAD<br>";

echo "Nouveau solde : " . $compte1->getSolde() . " MAD<br>";

echo "<h3>Tester les retraits</h3>";

foreach ($comptes as $compte) {
    tenterRetrait($compte, 1700);
    tenterRetrait($compte, 300);
}

echo "<h3>Gestion de la banque</h3>";

$banque = new Banque("Ma Banque");

$banque->ajouterCompte($compte1);
$banque->ajouterCompte($compte2);

echo "Liste des comptes :<br>";
$banque->afficherComptes();

echo "Total des dépôts : " . $banque->totalDepots() . " MAD<br>";

echo "Nombre de comptes épargne : " .
    ($banque->comptesParType()["Épargne"] ?? 0) . "<br>";

echo "Nombre de comptes courants : " .
    ($banque->comptesParType()["Courant"] ?? 0) . "<br>";

echo "Nombre total de comptes créés : " .
    CompteBancaire::getNombreComptes() . "<br>";