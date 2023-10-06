<?php
//exo2
$nom = "Adama";
$age = 24;
$profession = "Apprenante";
$ville_de_naissance = "Thiaroye";
$parcours = "J'ai étudiais a isi en tant qu'etudiante en GL et maintenant je fais une formation à simplon pour une durée de 6mois";
$biographie = "Ma biographie";

//exo3
function dates($hd,$md,$hf,$mf){
$s = 0;

$h = $hd - $hf;
$m = $md - $mf;
if ($h < 0)
    $h = -($h);

if ($m < 0)
    $m = -($m);
echo "la durée est : ".$h."h:".$m."mn:".$s."s";
}
dates(9,30,14,45);

echo "<br>";
echo "Aujourd'hui, c'est le ".date("l j F Y");echo "<br>";

function estBissextile($annee) {
    if (($annee % 4 == 0 && $annee % 100 != 0) || ($annee % 400 == 0)) {
        return true; // L'année est bissextile
    } else {
        return false; // L'année n'est pas bissextile
    }
}
if (estBissextile(2024)) {
    echo "2024 est une année bissextile.";
    echo "<br>";

} else {
    echo "2024 n'est pas une année bissextile.";
    echo "<br>";

}
//exo4
// Tableaux de préfixes et de suffixes
$prefixes = ["dra", "zor", "gar", "el", "thor"];
$suffixes = ["gon", "ax", "ius", "a", "or"];

function genererNomCreatureFantastique($prefixes, $suffixes) {
    $prefixAleatoire = $prefixes[array_rand($prefixes)];
    $suffixeAleatoire = $suffixes[array_rand($suffixes)];

    return ucfirst($prefixAleatoire) . $suffixeAleatoire;
}

$nomCreatureFantastique = genererNomCreatureFantastique($prefixes, $suffixes);
echo "Nom de créature fantastique : " . $nomCreatureFantastique;
echo "<br>";



//exo5
/*Écrivez une fonction qui calcule la moyenne d'une liste de nombres stockés dans un tableau.
Ensuite, ajoutez une fonction qui regroupe tous les nombres supérieurs et inférieurs à la moyenne dans 2 tableaux distincts.
*/
function moyenne(){
    $tab = [15, 13, 10, 9, 8];

    $nombresSuperieurs = [];
    $nombresInferieurs = [];
    
    $cpt = 0;
    for ($i=0; $i < count($tab); $i++) { 
        $cpt += $tab[$i];
    }
    $moyenne = $cpt/count($tab);
    echo "La moyenne est $moyenne <br>";
    
    foreach ($tab as $nombre) {
        if ($nombre > $moyenne) {
            array_push($nombresSuperieurs,$nombre);
            $nombresSuperieurs[] = $nombre;
        } elseif ($nombre < $moyenne) {
            $nombresInferieurs[] = $nombre;
        }
    }
    echo "Nombres supérieurs à la moyenne : " . implode(", ", $nombresSuperieurs) . "<br>";
    echo "Nombres inférieurs à la moyenne : " . implode(", ", $nombresInferieurs)."<br>";
}

//Les tableaux
$etudiants1 = [
    ["nom" => "Gueye", "prénom" => "Adama", "âge" => 20, "note" => 19],
    ["nom" => "Wade", "prénom" => "Yama", "âge" => 22, "note" => 18],
    ["nom" => "Mangage", "prénom" => "Coumba", "âge" => 21, "note" => 17]
];

$etudiants2 = [
    ["nom" => "Gueye", "prénom" => "Adama", "âge" => 20, "note" => 19],
    ["nom" => "Sarr", "prénom" => "Moustapha", "âge" => 23, "note" => 16]
];

//$etudiantsFusionnes = array_merge($etudiants1,$etudiants2);
$etudiantsFusionnes = [...$etudiants1,...$etudiants2];


echo "Étudiants fusionnés avec doublons :<br>";
print_r($etudiantsFusionnes);


$etudiantsAbsents = array_diff_key($etudiants1, $etudiants2);
echo "Étudiants présents dans le premier tableau, mais absents dans le deuxième :<br>";
print_r($etudiantsAbsents); 


$etudiantsUniques = array_unique($etudiantsFusionnes, SORT_REGULAR);

echo "Étudiants fusionnés sans doublons :<br>";
print_r($etudiantsUniques);

//exo7



//Exo8 1:

function comparerPhrases($phrase1, $phrase2) {
    return strcmp($phrase1, $phrase2) === 0;
}

$phraseA = "Ceci est une phrase.";
$phraseB = "Ceci est une phrase.";
$phraseC = "Ceci est une autre phrase.";

if (comparerPhrases($phraseA, $phraseB)) {
    echo "Les phrases A et B sont identiques.\n";
} else {
    echo "Les phrases A et B ne sont pas identiques.\n";
}

if (comparerPhrases($phraseA, $phraseC)) {
    echo "Les phrases A et C sont identiques.\n";
} else {
    echo "Les phrases A et C ne sont pas identiques.\n";
}

//Exo8 2:

function comparerPhrases2($phrase1, $phrase2) {
    $j = 0;
    for ($i=0; $i < strlen($phrase1) && $i < strlen($phrase2) ; $i++) { 
       if(strtolower($phrase1[$i]) == strtolower($phrase2[$i])){
            $j++;
       }
    }
    if($j == strlen($phrase1) && $j == strlen($phrase2))
        echo "Les phrases sont identiques.\n";
    else 
        echo "Les phrases ne sont pas identiques.\n";
}
$phrase1 = "cc Yama";
$phrase2 = "cc Yama";
comparerPhrases2($phrase1, $phrase2);

// Heure de départ
$heureDepart = new DateTime("2023-10-18 08:30:00");

// Heure de départ
$heureDepart = new DateTime("2023-10-18 08:30:00");

// Heure d'arrivée
$heureArrivee = new DateTime("2023-11-19 12:45:00"); // Le mois peut être différent

// Calcul de la durée en heures
$interval = $heureDepart->diff($heureArrivee);
$dureeEnHeures = $interval->days * 24 + $interval->h;

// Affichage de la durée en heures
echo "Heure de départ : " . $heureDepart->format("Y-m-d H:i:s") . "<br>";
echo "Heure d'arrivée : " . $heureArrivee->format("Y-m-d H:i:s") . "<br>";
echo "Durée en heures : " . $dureeEnHeures . " heures<br>";


?>
