<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nom_de_la_base_de_donnees";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Traitement de l'image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    // Récupération des autres champs
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

    // Insertion des données dans la base
    $sql = "INSERT INTO enseignants (photo, type, kode, discipline, telephone, courriel, residence, linkedin, x, insta, tiktok, youtube)
            VALUES ('$target_file', '$type', '$kode', '$discipline', '$telephone', '$courriel', '$residence', '$linkedin', '$x', '$insta', '$tiktok', '$youtube')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
