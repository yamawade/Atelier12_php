<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur de devises</title>
</head>
<body>
    <?php
    $historique = 'historique.txt'; 
    $montantEuro = 0;
    if(isset($_POST["submit"])) {
        if(empty($_POST["franc"])) {
            echo "Veuillez saisir une valeur dans le premier champ input";
        } elseif($_POST["franc"] < 0) {
            echo "Veuillez saisir une valeur positive";
        } else {
            $montantFranc = floatval($_POST["franc"]);
            $montantEuro = round($montantFranc / 650 , 2);
            file_put_contents($historique, date('Y-m-d H:i:s') ." $montantFranc francs = $montantEuro euros\n", FILE_APPEND | LOCK_EX);
        }    
    }
    ?>

    <form action="" method="post">
        <label for="franc">Montant en francs :</label><br>
        <input type="number" step="0.01" name="franc" placeholder="FR"><br>
        <button type="submit" name="submit">Convertir</button><br>
        <label for="euro">Montant en euros :</label><br>
        <input type="text" name="euro" placeholder="Euro" value="<?=$montantEuro;?>">
    </form>

    <?php
    $lines = file($historique, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines !== false) {
        echo '<h2>Historique :</h2>';
        $historiqueParDate = [];

        foreach ($lines as $line) {
            list($date, $conversion) = explode(" ", $line, 2); 
            $historiqueParDate[$date][] = $conversion;
        }

        krsort($historiqueParDate);
        foreach ($historiqueParDate as $date => $conversions) {
            echo "<h3>$date</h3>";
            echo implode("<br>", $conversions);
            echo "<br><br>";
        }
    }
    ?>
</body>
</html>
