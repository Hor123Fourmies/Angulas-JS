<?php
// recherche à taper ds Google : 'php get json post data'
//https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/
// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, true);
// Si problème, ajouter 'true' après $json :
// $data = json_decode($json, true);
print_r($data);

$nouveauFilm = $data['nouveauFilm'];



// poss de maniupler les données :
//$data['nouveauFilm'] = "php";
//echo $data['nouveauFilm'];
//echo json_encode($data);