<?php 


$fichierjsonFinale = 'choixFinal.json';


if (file_exists($fichierjsonFinale)) {

    $choixFinal = json_decode(file_get_contents($fichierjsonFinale), true);
} else {
    $choixFinal = [];
}


echo "<pre>";
print_r($_SERVER);
print_r($_POST);
echo "</pre>";








if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

   
    echo "Note(4/5): $note, Places restantes: $placesDisponibles,Prix: $prix, Date: $date, Heure de départ: $heureDépart, Heure d'arrivée:$heureArrivée, Type de voyage $typeVoyage ";


   
    $note = htmlspecialchars($_POST['note']);
     $placesDisponibles = htmlspecialchars($_POST['placesDisponibles']); 
     $prix = htmlspecialchars($_POST['prix']); 
     $date = htmlspecialchars($_POST['date']); 
     $heureDépart = htmlspecialchars($_POST['heureDépart']); 
     $heureArrivée = htmlspecialchars($_POST['heureArrivée']); 
     $typeVoyage = htmlspecialchars($_POST['typeVoyage']);
     

     $nvCovo = [
      'note' => $note,
      'placesDisponibles' => $placesDisponibles,
      'prix' => $prix,
      'date' => $date,
      'heureDépart' => $heureDépart,
      'heureArrivée' => $heureArrivée,
      'typeVoyage' => $typeVoyage
  ];

   $choixFinal[] = $nvCovo;

      



     file_put_contents($fichierjsonFinale, json_encode($choixFinal, JSON_PRETTY_PRINT));


     echo "<p>Choix final pris en compte !</p>"; 
     } 
     ?> 
     <!DOCTYPE html> 
     <html lang="fr"> 
        <head>
             <meta charset="UTF-8"> 
             <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
             <link rel="stylesheet" href="Covoiturage ecoride.css">

             <title>Choix Final</title> 
            </head> 
            <body>
                 <h1>Choix Final de Covoiturage</h1> 

                 <form action="gereesp.php" method="POST"> 

                    <label for="note">Note (4/5):</label> 
                    <input type="text" id="note" name="note" required> 
                    <label for="placesDisponibles">Places restantes:</label> 
                    <input type="number" id="placesDisponibles" name="placesDisponibles" required> 
                    <label for="prix">Prix:</label>
                     <input type="text" id="prix" name="prix" required> 
                     <label for="date">Date:</label> 
                     <input type="text" id="date" name="date" required>
                      <label for="heureDépart">Heure de départ:</label>
                       <input type="text" id="heureDépart" name="heureDépart" required> 
                       <label for="heureArrivée">Heure d'arrivée:</label> 
                       <input type="text" id="heureArrivée" name="heureArrivée" required> 
                       <label for="typeVoyage">Type de voyage:</label> 
                       <input type="text" id="typeVoyage" name="typeVoyage" required>
                        <button type="submit">Valider</button>
                     </form>

                     <h2>Liste des Covoiturages</h2>
    <ul>
        <?php foreach ($choixFinal as $covoiturage): ?>
            <li>
                Note: <?= htmlspecialchars($covoiturage['note']) ?>, 
                Places restantes: <?= htmlspecialchars($covoiturage['placesDisponibles']) ?>, 
                Prix: <?= htmlspecialchars($covoiturage['prix']) ?>, 
                Date: <?= htmlspecialchars($covoiturage['date']) ?>, 
                Heure de départ: <?= htmlspecialchars($covoiturage['heureDépart']) ?>, 
                Heure d'arrivée: <?= htmlspecialchars($covoiturage['heureArrivée']) ?>, 
                Type de voyage: <?= htmlspecialchars($covoiturage['typeVoyage']) ?>
            </li>
        <?php endforeach; ?>

        <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>


                     </body> 
                     </html>
