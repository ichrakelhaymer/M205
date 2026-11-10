<?php
declare(strict_types=1);

echo "stagiaire\n";

$stagiaire = ['nom' => 'Alami', 'prenom' => 'Sara', 'age' => 21, 'filiere' => 'developement digitale', 'notes' => ['php' => 16, 'js' => 14, 'sql' => 15],];

echo $stagiaire['prenom'] . " " . strtoupper($stagiaire['nom']);
echo ", " . $stagiaire['age'] . " ans";
echo ", filière : " . $stagiaire['filiere'] . "\n";

$stagiaire['ville'] = 'Casablanca';
$stagiaire['age'] = 22;
print_r($stagiaire);

echo "email :" . ($stagiaire['email'] ?? 'non renseigné') . "\n";
$stagiaire['telephone'] = null;

echo "isset :" ;
var_dump(isset($stagiaire['telephone']));

echo "array_key_exists :";
var_dump(array_key_exists('telephone', $stagiaire));

unset($stagiaire['ville']);

echo "note php :" . $stagiaire['notes']['php'] . "\n";
$moyenne = array_sum($stagiaire['notes']) / count($stagiaire['notes']);

echo "moyenne : " . number_format($moyenne, 2) . "\n";

foreach ($stagiaire['notes'] as $matiere => $note) {
    echo "$matiere : $note/20\n";
}

echo "panier\n";

$panier = [
    'clavier' => 250,
    'souris' => 90,
    'ecran' => 1400,
    'casque' => 320,
];

$total = array_sum($panier);
$nombresarticles = count($panier);

echo "total du panier : $total MAD\n";
echo "nombre d'articles : $nombresarticles\n";

$prixmax = max($panier);
$prixmin = min($panier);

$produitcher = array_search($prixmax, $panier);
$produitmoincher = array_search($prixmin, $panier);
echo "produit le plus cher : $produitcher ($prixmax MAD)\n";
echo "produit le moins cher : $produitmoincher ($prixmin MAD)\n";

$panierremise = array_map(
    fn($prix) => $prix * 0.90,
    $panier
);

echo "panier après remise :\n";
foreach ($panierremise as $produit => $prix) {
    echo "$produit : $prix MAD\n";
}

$panierfiltre = array_filter(
    $panier,
    fn($prix) => $prix > 200
);

echo "article a plus de 200 MAD :\n";
print_r($panierfiltre);

$parnom = $panier;
ksort($parnom);
echo($croissant);

echo "tri par nom :\n";
print_r($parnom);

$croissant = $panier;
asort($croissant);

echo "tri par prix croissant :\n";
print_r($croissant);

$decroissant = $panier;
arsort($decroissant);

$quantite = [
    'clavier' => 1,
    'souris' => 1,
    'ecran' => 1,
    'casque' => 1,
];

$nouveauproduit = 'webcam' ;

if (!array_key_exists($nouveauproduit, $panier)) {
    $panier[$nouveauproduit] = 180;
    $quantites[$nouveauproduit] = 1;
}else{
    $quantites[$nouveauproduit]++;
}

echo "panier après ajout :\n";
print_r($panier);

echo "panier detaillé :\n";
foreach ($panier as $produit => $prix) {
    printf("%-10s %8.2f MAD\n", $produit, $prix);
}

echo "classe\n";
$stagiaire = [
    [
    'nom' => 'Alami',
    'filiere' => 'developpement ',
    'notes' => [16, 14, 15],
],
[
    'nom' => 'Bennani',
    'filiere' => 'infrastructure',
    'notes' => [18, 17, 19]
],
[
    'nom' => 'Daoudi',
    'filiere' => 'infrastructure',
    'notes' => [9, 10, 8]
],
];

foreach ($stagiaire as &$s) {
    $s['moyenne'] = array_sum($s['notes']) / count($s['notes']);
}

unset($s);

$nom = array_column($stagiaire, 'nom');

echo "liste des noms :\n";
print_r($nom);

$moyennes = array_column($stagiaire, 'moyenne', 'nom');

echo "Nom => moyenne :\n";
print_r($moyennes);

usort(
    $stagiaire,
    fn($a, $b) => $b['moyenne'] <=> $a['moyenne']
);

echo "\nClassement :\n";

foreach ($stagiaires as $i => $s) {
    printf(
        "%d. %-10s (%.2f)\n",
        $i + 1,
        $s['nom'],
        $s['moyenne']
    );
}

$meilleur = $stagiaires[0];

echo "\nMeilleur stagiaire : " . $meilleur['nom'] . "\n";

$moyennesClasse = array_column($stagiaires, 'moyenne');

$moyenneGenerale = array_sum($moyennesClasse) / count($moyennesClasse);

echo "Moyenne générale : " . number_format($moyenneGenerale, 2) . "\n";

$admis = array_filter(
    $stagiaires,
    fn($s) => $s['moyenne'] >= 10
);

echo "\nStagiaires admis :\n";

foreach ($admis as $s) {
    echo $s['nom'] . " : " . $s['moyenne'] . "\n";
}


$parFiliere = [];

foreach ($stagiaires as $s) {
    $filiere = $s['filiere'];

    if (!isset($parFiliere[$filiere])) {
        $parFiliere[$filiere] = [];
    }

    $parFiliere[$filiere][] = $s;
}

echo "\nRegroupement par filière :\n";

foreach ($parFiliere as $filiere => $liste) {

    $moyennesFiliere = array_column($liste, 'moyenne');

    $moyenneFiliere = array_sum($moyennesFiliere) / count($liste);

    echo "\nFilière : $filiere\n";
    echo "Effectif : " . count($liste) . "\n";
    echo "Moyenne : " . number_format($moyenneFiliere, 2) . "\n";
}


function mention(float $moyenne): string
{
    if ($moyenne < 10) {
        return "Ajourné";
    } elseif ($moyenne < 12) {
        return "Passable";
    } elseif ($moyenne < 14) {
        return "Assez bien";
    } elseif ($moyenne < 16) {
        return "Bien";
    } else {
        return "Très bien";
    }
}

foreach ($stagiaires as &$s) {
    $s['mention'] = mention($s['moyenne']);
}

unset($s);

echo "\nStagiaires avec leurs mentions :\n";
print_r($stagiaires);



echo "\ngestion de stock\n";

$stock = [
    'P001' => [
        'designation' => 'Clavier',
        'prix' => 250.0,
        'quantite' => 12
    ],
    'P002' => [
        'designation' => 'Souris',
        'prix' => 90.0,
        'quantite' => 40
    ],
    'P003' => [
        'designation' => 'Ecran',
        'prix' => 1400.0,
        'quantite' => 5
    ],
];


function ajouterProduit(
    array &$stock,
    string $ref,
    string $designation,
    float $prix,
    int $qte
): bool {

    if (array_key_exists($ref, $stock)) {
        return false;
    }

    if ($prix < 0 || $qte < 0) {
        return false;
    }

    $stock[$ref] = [
        'designation' => $designation,
        'prix' => $prix,
        'quantite' => $qte
    ];

    return true;
}


function retirerStock(
    array &$stock,
    string $ref,
    int $qte
): bool {

    if (!array_key_exists($ref, $stock)) {
        return false;
    }

    if ($qte < 0 || $stock[$ref]['quantite'] < $qte) {
        return false;
    }

    $stock[$ref]['quantite'] -= $qte;

    return true;
}


function valeurTotale(array $stock): float
{
    $total = 0;

    foreach ($stock as $produit) {
        $total += $produit['prix'] * $produit['quantite'];
    }

    return $total;
}


function produitsEnRupture(
    array $stock,
    int $seuil = 10
): array {

    $resultat = [];

    foreach ($stock as $ref => $produit) {
        if ($produit['quantite'] < $seuil) {
            $resultat[$ref] = $produit;
        }
    }

    return $resultat;
}

function afficherStock(array $stock): void
{
    echo "\n reference designation prix qte \n";

    foreach ($stock as $ref => $produit) {
        printf(
            "%-10s %-16s %8.2f MAD %5d\n",
            $ref,
            $produit['designation'],
            $produit['prix'],
            $produit['quantite']
        );
    }
}


if (ajouterProduit($stock, 'P004', 'Webcam', 180.0, 15)) {
    echo "\nProduit ajouté avec succès.\n";
} else {
    echo "\nImpossible d'ajouter le produit.\n";
}

if (!ajouterProduit($stock, 'P001', 'Clavier', 250.0, 10)) {
    echo "Cette référence existe déjà.\n";
}

if (retirerStock($stock, 'P001', 3)) {
    echo "3 claviers retirés.\n";
}

if (!retirerStock($stock, 'P003', 100)) {
    echo "Impossible de retirer 100 écrans : quantité insuffisante.\n";
}

afficherStock($stock);

echo "\nValeur totale du stock : ";
echo number_format(valeurTotale($stock), 2) . " MAD\n";

echo "\nProduits en rupture (moins de 10 unités) :\n";

$rupture = produitsEnRupture($stock);

print_r($rupture);

?>