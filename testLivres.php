<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produits_culturels";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


$json = file_get_contents('php://input');
$data = json_decode($json, true);
print_r($data);

// $nouveauLivre = $data['nouveauLivre'];
$titre = $data['nouveauLivre'];


$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error){
    echo $conn->connect_error;
}
else {
    $conn->select_db($dbname);

    $sql = "INSERT INTO livres VALUES (NULL, '$titre')";

    if ($conn->query($sql)){
        echo "Votre livre a été ajouté à la base de données avec succès.";
    }
    else {
        echo $conn->error;
        echo "Erreur";
    };
}


