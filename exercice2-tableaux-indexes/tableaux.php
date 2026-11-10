<?php
declare(strict_types=1);

$notes = [12, 15, 8, 17, 9, 14, 11];

$prenoms = ['Sara', 'Youssef', 'Imane', 'Omar', 'Khadija'];


echo "LECTURE ET PARCOURS \n";
echo "Premiere note : " . $notes[0] . "\n";
echo "Derniere note : " . $notes[array_key_last($notes)] . "\n";
echo "Nombre de notes : " . count($notes) . "\n";
echo "\nParcours avec FOR :\n";

for ($i = 0; $i < count($notes); $i++) {
    echo "Note n°" . ($i + 1) . " : " . $notes[$i] . "\n";
}

echo "\nParcours avec FOREACH :\n";

foreach ($notes as $i => $note) {
    echo "Note n°" . ($i + 1) . " : " . $note . "\n";
}

echo "\nListe des prenoms :\n";
foreach ($prenoms as $i => $prenom) {
    echo ($i + 1) . ". " . $prenom . "\n";
}

// ajouter retirer inserer

echo "\n\ MODIFICATION \n";

// 1. 

$notes1 = $notes;

$notes1[] = 16;

echo "Ajout avec [] :\n";
print_r($notes1);

$notes2 = $notes;

array_push($notes2, 16);
echo "Ajout avec array_push :\n";
print_r($notes2);

// 2. 

$notesModifiees = $notes;

array_unshift($notesModifiees, 10);
echo "Ajout de 10 au debut :\n";
print_r($notesModifiees);

// 3. 

$derniereNote = array_pop($notesModifiees);

echo "Note retiree a la fin : " . $derniereNote . "\n";

$premiereNote = array_shift($notesModifiees);

echo "Note retiree au debut : " . $premiereNote . "\n";
print_r($notesModifiees);

// 4.

array_splice($notesModifiees, 2, 0, [13]);

echo "Apres insertion de 13 :\n";
print_r($notesModifiees);

// 5.

unset($notesModifiees[1]);
echo "Apres unset (indices avec un trou) :\n";
print_r($notesModifiees);

$notesModifiees = array_values($notesModifiees);

echo "Apres array_values :\n";
print_r($notesModifiees);

// recherche 

echo "\nRECHERCHE \n";

// 1.

if (in_array(17, $notes, true)) {
    echo "La note 17 existe.\n";
} else {
    echo "La note 17 n'existe pas.\n";
}

// 2. 

$indice = array_search(9, $notes, true);

if ($indice !== false) {
    echo "La note 9 existe a l'indice : " . $indice . "\n";
} else {
    echo "La note 9 n'existe pas.\n";
}

// 3. 

if (in_array("Omar", $prenoms, true)) {
    echo "Omar figure dans la liste.\n";
} else {
    echo "Omar ne figure pas dans la liste.\n";
}

//stats

echo "\nSTATISTIQUES \n";

$somme = array_sum($notes);
$moyenne = $somme / count($notes);
$minimum = min($notes);
$maximum = max($notes);

echo "Somme : " . $somme . "\n";
echo "Moyenne : " . number_format($moyenne, 2) . "\n";
echo "Note minimale : " . $minimum . "\n";
echo "Note maximale : " . $maximum . "\n";

// 2. 

$nombreAdmis = 0;

foreach ($notes as $note) {
    if ($note >= 10) {
        $nombreAdmis++;
    }
}
echo "Nombre d'admis avec boucle : " . $nombreAdmis . "\n";

$notesAdmis = array_filter(
    $notes,
    fn($note) => $note >= 10
);
echo "Nombre d'admis avec array_filter : " . count($notesAdmis) . "\n";

// 3. 

$pourcentage = ($nombreAdmis / count($notes)) * 100;

echo "Pourcentage de reussite : " .
    number_format($pourcentage, 2) . "%\n";

// 4. 
$notesTriees = $notes;

sort($notesTriees);

$nombreNotes = count($notesTriees);
$milieu = intdiv($nombreNotes, 2);

if ($nombreNotes % 2 !== 0) {
    $mediane = $notesTriees[$milieu];
} else {
    $mediane = (
        $notesTriees[$milieu - 1] +
        $notesTriees[$milieu]
    ) / 2;
}
echo "Mediane : " . $mediane . "\n";

// tri
echo "\n TRI \n";

// 1. tri croissant 

$croissant = $notes;

sort($croissant);
echo "Ordre croissant :\n";
print_r($croissant);

// tri decroissant

$decroissant = $notes;

rsort($decroissant);
echo "Ordre decroissant :\n";
print_r($decroissant);


// 2. 3 meilleures notes

$meilleuresNotes = $notes;
rsort($meilleuresNotes);

$top3 = array_slice($meilleuresNotes, 0, 3);

echo "Les 3 meilleures notes :\n";
print_r($top3);

// 3. Prenoms ordre alphabetique

$prenomsTries = $prenoms;

sort($prenomsTries);
echo "Prenoms tries :\n";
print_r($prenomsTries);

// Prenoms inverses

$prenomsInverses = array_reverse($prenomsTries);

echo "Prenoms inverses :\n";
print_r($prenomsInverses);

// array_map, array_filter, array_reduce

echo "\nTRANSFORMATIONS \n";
// 1. 

$notesBonus = array_map(
    fn($note) => min(20, $note + 1),
    $notes
);
echo "Notes avec bonus :\n";
print_r($notesBonus);

// 2. Tableau des admis

$admis = array_values(
    array_filter(
        $notes,
        fn($note) => $note >= 10
    )
);
echo "Notes des admis :\n";
print_r($admis);

// 3. calculer la somme 

$total = array_reduce(
    $notes,
    fn($cumul, $note) => $cumul + $note,
    0
);
echo "Total avec array_reduce : " . $total . "\n";


// 4. prenoms en majuscules

$prenomsMajuscules = array_map("strtoupper", $prenoms);

echo "Prenoms en majuscules :\n";
print_r($prenomsMajuscules);


// 5. mentions

$mentions = array_map(
    function ($note) {
        if ($note < 10) {
            $mention = "Ajourné";
        } elseif ($note < 14) {
            $mention = "Passable";
        } elseif ($note < 16) {
            $mention = "Assez bien";
        } else {
            $mention = "Bien";
        }
        return $note . " → " . $mention;
    },
    $notes
);

echo "Mentions :\n";
print_r($mentions);

//chaines fusion...

echo "\n========== ETAPE 7 : CHAINES ET ENSEMBLES ==========\n";

// 1. 

echo "Prenoms : " . implode(", ", $prenoms) . "\n";


// 2.

$chaine = "php,js,sql,php,html,js";
$langages = explode(",", $chaine);
$langagesUniques = array_values(array_unique($langages));

echo "Langages sans doublons :\n";
print_r($langagesUniques);


// 3. 

$a1 = ["php", "sql"];
$b1 = ["js", "sql"];

$fusion = array_merge($a1, $b1);
$fusion = array_values(array_unique($fusion));

echo "Fusion dedoublonnee :\n";
print_r($fusion);


// 4. 

$a = ["php", "js", "sql"];
$b = ["js", "html", "sql"];

$communs = array_intersect($a, $b);
$difference = array_diff($a, $b);
echo "Elements communs :\n";
print_r($communs);
echo "Elements uniquement dans A :\n";
print_r($difference);


// 5.

$nombres = range(1, 10);
$paquets = array_chunk($nombres, 3);
echo "Paquets de 3 :\n";
print_r($paquets);


// 6. Fonction moyenne

function moyenne(array $notes): float
{
    if (count($notes) === 0) {
        return 0.0;
    }
    return array_sum($notes) / count($notes);
}

// 7. Fonction mediane

function mediane(array $notes): float
{
    if (count($notes) === 0) {
        return 0.0;
    }
    sort($notes);
    $nombre = count($notes);
    $milieu = intdiv($nombre, 2);
    if ($nombre % 2 !== 0) {
        return (float) $notes[$milieu];
    }
    return (
        $notes[$milieu - 1] +
        $notes[$milieu]
    ) / 2;
}


// 8. Fonction admis

function admis(array $notes, float $seuil = 10): array
{
    $resultat = array_filter(
        $notes,
        fn($note) => $note >= $seuil
    );
    return array_values($resultat);
}


// 9. Fonction meilleures

function meilleures(array $notes, int $n = 3): array
{
    rsort($notes);
    return array_slice($notes, 0, max(0, $n));
}


// 10. Fonction histogramme

function histogramme(array $notes): void
{
    if (count($notes) === 0) {
        echo "Aucune note disponible.\n";
        return;
    }
    foreach ($notes as $note) {
        $etoiles = str_repeat("*", max(0, (int) $note));
        echo $note . " : " . $etoiles . "\n";
    }
}


//test
echo "\n TEST DES FONCTIONS \n";

echo "Moyenne : " . moyenne($notes) . "\n";

echo "Mediane : " . mediane($notes) . "\n";

echo "Admis : ";
print_r(admis($notes));

echo "Meilleures notes : ";
print_r(meilleures($notes));

echo "\nHistogramme :\n";
histogramme($notes);

echo "\n TEST TABLEAU VIDE \n";

$tableauVide = [];

echo "Moyenne : " . moyenne($tableauVide) . "\n";

echo "Mediane : " . mediane($tableauVide) . "\n";

echo "Admis : ";
print_r(admis($tableauVide));

echo "Meilleures notes : ";
print_r(meilleures($tableauVide));

echo "Histogramme :\n";
histogramme($tableauVide);