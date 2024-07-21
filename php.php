<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "profs_haroun20240724";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if (isset($_POST['validator'])) {
    $photo = $_FILES['photo']['tmp_name'];
    $kode = $_POST['kode'];
    $type = $_POST['type'];
    $discipline = $_POST['discipline'];
    $telephone = $_POST['telephone'];
    $kourriel = $_POST['kourriel'];
    $residence = $_POST['residence'];
    $x = $_POST['x'];
    $linkedin = $_POST['linkedin'];
    $insta = $_POST['insta'];
    $tiktok = $_POST['tiktok'];
    $youtube = $_POST['youtube'];

    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO enseignants (photo, kode, type, discipline, telephone, kourriel, residence, x, linkedin, insta, tiktok, youtube) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    foreach($photo as $index => $img) {
        $imgContent = file_get_contents($img);
        $stmt->bind_param("bsssssssssss",
            $imgContent,
            $kode[$index],
            $type[$index],
            $discipline[$index],
            $telephone[$index],
            $kourriel[$index],
            $residence[$index],
            $x[$index],
            $linkedin[$index],
            $insta[$index],
            $tiktok[$index],
            $youtube[$index]
        );
        $stmt->send_long_data(0, $imgContent); // pour les images
        $stmt->execute();
    }
    echo "Les données ont été enregistrées avec succès";
}

$conn->close();
?>
