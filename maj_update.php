<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    // Mise à jour des données dans la base
    $sql = "UPDATE enseignants SET type='$type', kode='$kode', discipline='$discipline', telephone='$telephone', courriel='$courriel', residence='$residence', linkedin='$linkedin', x='$x', insta='$insta', tiktok='$tiktok', youtube='$youtube' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
