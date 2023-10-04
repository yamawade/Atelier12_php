<?php
function initialiserJeu() {
    return rand(1, 100);
}

function jouerJeuDevinette() {
    $nombreADeviner = initialiserJeu();
    $nombreEssais = 0;
    $lettresDevinées = [];
    $erreurs = 0;
    
    printf("Bienvenue dans le jeu de devinette du nombre entre 1 et 100.\n"); 

    while (true) {
        $nombreEssais++;
        printf("Essai #$nombreEssais : Entrez un nombre : ") ;
        $nombreProposé = (int) fgets(STDIN);
        
        if ($nombreProposé == $nombreADeviner) {
            printf("Bravo ! Vous avez deviné le nombre en $nombreEssais essais.\n") ;
            break;
        } elseif ($nombreProposé < $nombreADeviner) {
            printf("Le nombre est plus petit. "); 
            if (abs($nombreProposé - $nombreADeviner) < 10) {
                printf("Vous êtes proche.\n") ;
            } else {
                printf("Essayez encore.\n");
            }
        } else {
            printf("Le nombre est plus grand. ") ;
            if (abs($nombreProposé - $nombreADeviner) < 10) {
                printf( "Vous êtes proche.\n");
            } else {
                printf("Essayez encore.\n") ;
            }
        }
        
        $lettresDevinées[] = $nombreProposé;
        
        if ($nombreProposé != $nombreADeviner) {
            $erreurs++;
        }
        
        printf( "Lettres devinées : " . implode(", ", $lettresDevinées) . "\n");
        printf( "Nombre d'erreurs : $erreurs\n");
       // printf("Progression : " . round(($nombreEssais / 10) * 100) . "%\n");
    }
}

jouerJeuDevinette();
?>
