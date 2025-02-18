<?php 

$fichierjsonEcoride = 'trajetsCov.json';


if (file_exists($fichierjsonEcoride)) {
    $covDonnées = json_decode(file_get_contents($fichierjsonEcoride), true);
} else {
    $covDonnées = [];
}



echo "<pre>";
print_r($_SERVER);
print_r($_POST);
echo "</pre>";





$covDonnées = []; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $departAdress = htmlspecialchars(trim ($_POST['departAdress'])); 
    $departArrivée = htmlspecialchars(trim ($_POST['departArrivée']));
     $dateTrajet = htmlspecialchars(trim ($_POST['dateTrajet'])); 
     
     echo "Départ: $departAdress, Arrivée: $departArrivée, Date: $dateTrajet";



     if ($departAdress && $departArrivée && $dateTrajet) { 
     
     $covDonnées[] = [ 
        'depart' => $departAdress, 
        'arrivée' => $departArrivée,
         'date' => $dateTrajet 
         ]; 

               
        file_put_contents($fichierjsonEcoride, json_encode($covDonnées, JSON_PRETTY_PRINT));


         echo "<p>Formulaire soumis avec succès !</p>";
          }
           else { 
            echo "<p>Veuillez remplir tous les champs obligatoires.</p>"; 
            } 
            } 
            ?> 
            <!DOCTYPE html> 
            <html lang="fr"> 
                <head> 
                    <meta charset="UTF-8"> 
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                    <title>Covoiturage</title> 
                    <link rel="stylesheet" href="Covoiturage ecoride.css">
                </head> 
                <body> 
                    <h1>Espace de Covoiturages</h1> 
                    
                      <form action="gereadmin.php"  method="POST"  >  
                        <label for="departAdress"> Adresse de départ:</label> 
                        <input type="text" id="departAdress" name="departAdress" required> 
                        <label for="departArrivée">Adresse d'arrivée:</label> 
                        <input type="text" id="departArrivée" name="departArrivée" required> 
                        <label for="dateTrajet">Date du trajet:</label> 
                        <input type="text" id="dateTrajet" name="dateTrajet" required> 
                        <button type="submit">Valider</button> 
                    </form>
                    <ul>
                         <?php foreach ($covDonnées as $covoiturage): ?> 
                            <li>
                            Départ: <?= $covoiturage['depart'] ?>,
                             Arrivée: <?= $covoiturage['arrivée'] ?>, 
                             Date: <?= $covoiturage['date'] ?>
                            </li> 
                            <?php endforeach; ?> 

                     <h2>Covoiturages enregistrés :</h2> 
                     
                     </body> 
                     </html>
