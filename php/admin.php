<?php
$dbhost = 'localhost';
$dbname = 'quiz';
$dbuser = 'root';
$dbpswd = '';
try {
    $connect = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,
    array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        )
    );
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la Base de données !");
}

$sql = "SELECT * FROM administrateur";
$result = $connect->query($sql);

if ($result->rowCount() > 0) {
    echo "Vous êtes déjà inscrit !";
} else {
    echo "Inscription réussie !";
}

$connect = null; 
?>
