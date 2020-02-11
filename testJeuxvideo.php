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

// $nouveauJeu = $data['nouveauJeu'];

$nom = $data['nouveauJeu'];


$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error){
    echo $conn->connect_error;
}
else {
    $conn->select_db($dbname);

    $sql = "INSERT INTO jeuxVideo VALUES (NULL, '$nom')";

    if ($conn->query($sql)){
        echo "Le jeu video a bien été pris en compte dans la base de données.";
    }
    else {
        echo $conn->error;
        echo "Erreur";
    };
}