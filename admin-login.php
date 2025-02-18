
<?php
session_start();


$data = json_decode(file_get_contents("php://input"), true);
$admins = json_decode(file_get_contents("admins.json"), true);


foreach ($admins as $admin) {
    
    if ($admin["utilisateur"] === $data["utilisateur"] && $admin["mail"] === $data["mail"]) {
        
        
        if (password_verify($data["motdePasse"], $admin["motdePasse"])) {
            $_SESSION["admin"] = $data["utilisateur"];
            echo json_encode(["validé" => true, "message" => "Connexion réussie"]);
            exit;
        }
    }
}


echo json_encode(["validé" => false, "message" => "Connexion échouée"]);
