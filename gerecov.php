<?php 

$fichierjsonFiltres = 'filtresCov.json';


if (file_exists($fichierjsonFiltres)) {

    $filtrages = json_decode(file_get_contents($fichierjsonFiltres), true);
} else {
    $filtrages = [];
}





echo "<pre>";
print_r($_SERVER);
print_r($_POST);
echo "</pre>";



$filtrages = []; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 

  echo "Option écologique: $ecochoix, Prix: $prix,Prix minimum: $minPrix";

    
    $ecochoix = htmlspecialchars($_POST['ecochoix']);
     $prix = htmlspecialchars($_POST['prix']); 
     $minPrix = htmlspecialchars($_POST['minPrix']); 
     $filtrages = [ 
        'ecochoix' => $ecochoix, 
        'prix' => $prix, 
        'minPrix' => $minPrix 
        ]; 

        file_put_contents($fichierjsonFiltres, json_encode($filtrages, JSON_PRETTY_PRINT));



        echo "<p> Filtres appliqués avec succès !</p>"; 
        } 
        ?>
         <!DOCTYPE html>
          <html lang="fr"> 
            <head>
                 <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                  <link rel="stylesheet" href="Covoiturage ecoride.css">

                  <title>Filtres Covoiturage </title> 
                </head>
                 <body>
                     <h1>Filtre des Covoiturages </h1> 
                     <form  action="gerecov.php" method="POST"    > 
                        <label for="ecochoix">Option écologique:</label> 
                        <input type="text" id="ecochoix" name="ecochoix" placeholder="Voiture électrique" required> 
                        <label for="prix">Prix:</label> 
                        <input type="text" id="prix" name="prix" placeholder="15£" required> 
                        <label for="minPrix">Prix minimum:</label> 
                        <input type="text" id="minPrix" name="minPrix" placeholder="10£" required> 
                        <button type="submit">Appliquer les filtres</button> 
                    </form>
                     
                      
                      <ul> 
                        <?php foreach ($filtrages as $clé => $valeur): ?> 
                            <li> 
                                <?= ucfirst($clé) ?>: 
                                <?= $valeur ?>
                            </li> 
                            <?php endforeach; ?> 
                        </ul>
                     </body> 
                     </html>
