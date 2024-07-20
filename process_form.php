<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Configuration de la base de données
    $servername = "localhost";
    $username = "root";
    $password = ""; // Remplacez par votre mot de passe MySQL si nécessaire
    $dbname = "profsprojetharoun_20240724"; // Nom de la base de données

    // Connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Dossier de destination pour les fichiers uploadés
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    // Récupération des données du formulaire
    $type = $_POST['type'];
    $kode = $_POST['kode'];
    $discipline = $_POST['discipline'];
    $telephone = $_POST['telephone'];
    $courriel = $_POST['courriel'];
    $residence = $_POST['residence'];
    $linkedin = $_POST['linkedin'];
    $x = $_POST['x'];
    $insta = $_POST['insta'];
    $tiktok = $_POST['tiktok'];
    $youtube = $_POST['youtube'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO profs_haroun20240724 (photo, type, kode, discipline, telephone, courriel, residence, linkedin, x, insta, tiktok, youtube)
            VALUES ('$target_file', '$type', '$kode', '$discipline', '$telephone', '$courriel', '$residence', '$linkedin', '$x', '$insta', '$tiktok', '$youtube')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
