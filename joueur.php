<?php
$dbhost = 'mysql-rokhayadiaw.alwaysdata.net';
$dbname = 'Rokhayadiaw_java';
$dbuser = '352837';
$dbpswd = 'passe123';

try {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    die("Une erreur est survenue lors de la connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des champs de formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification si l'étudiant existe déjà dans la base de données
    $sql = "SELECT * FROM joueur WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $existing_student = $stmt->fetch();

    if ($existing_student) {
        echo "L'étudiant existe déjà dans la base de données.";
    } else {
        // Inscription de l'étudiant
        $sql = "INSERT INTO joueur (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['prenom' => $prenom, 'nom' => $nom, 'email' => $email, 'password' => $password]);
        echo "Inscription réussie !";
    }
}
?>