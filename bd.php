<?php
const SERVER = "localhost";
const NOM_BD = "gestion_materiel";
const UTILISATEUR = "root";
const MOT_DE_PASSE = "";
$dsn = 'mysql:host=' . SERVER . ';dbname=' . NOM_BD . ';charset=utf8';
$option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$cheminLog = 'C:/xampp/htdocs/simplon/Atelier12_php/mesLog.log';

try {
    $bd = new PDO($dsn, UTILISATEUR, MOT_DE_PASSE, $option);
    if ($bd === null) {
        $modeErreur = $bd->getAttribute(PDO::ATTR_ERRMODE);
        echo "Mode d'erreur : $modeErreur";
    } else {
        echo "La connexion à la base de données a échoué.";
    }
} catch (PDOException $th) {
    $message = "Erreur de connexion : " . $th->getMessage();
    error_log($message, 3, $cheminLog);
}