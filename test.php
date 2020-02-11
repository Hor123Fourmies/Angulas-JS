<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produits_culturels";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);

// recherche à taper ds Google : 'php get json post data'
//https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/
// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, true);
// Si problème, ajouter 'true' après $json :
// $data = json_decode($json, true);
print_r($data);




// $nouveauFilm = $data['nouveauFilm'];
$titre = $data['nouveauFilm'];




/*
 * REQUETE PREPAREE INSERT
$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];


$stmt = $conn->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (?,?,?,?,?)");

$stmt->bind_param("ssiii", $name, $difficulty, $distance, $duration, $height_difference);


if($stmt->execute()){
    print "Le film <span style='font-weight: bold'>$name</span> a bien été ajouté à la base de données.";
}else{
    print $conn->error;
}


//$stmt->execute();

$stmt->close();
*/


// * REQUETE INSERT
$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error){
    echo $conn->connect_error;
}
else {
    $conn->select_db($dbname);

    $sql = "INSERT INTO films VALUES (NULL, '$titre')";

    if ($conn->query($sql)){
        echo "Le film a bien été ajouté à la base de données.";
    }
    else {
        echo $conn->error;
        echo "Erreur";
    };
}



// poss de maniupler les données :
//$data['nouveauFilm'] = "php";
//echo $data['nouveauFilm'];
//echo json_encode($data);
