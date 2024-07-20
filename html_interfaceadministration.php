<!-- Page d'administration -->
<h2>Administration des enseignants</h2>

<!-- Formulaire pour ajouter un nouvel enseignant -->
<form action="process_form.php" method="post" enctype="multipart/form-data">
    <!-- Champs de formulaire comme précédemment -->
    <input type="submit" value="Ajouter un enseignant" name="validator">
</form>

<!-- Liste des enseignants existants avec des options pour modifier/supprimer -->
<table>
    <tr>
        <th>Photo</th>
        <th>Type</th>
        <th>Kode</th>
        <th>Discipline(s)</th>
        <th>Téléphone</th>
        <th>Courriel</th>
        <th>Résidence</th>
        <th>LinkedIn</th>
        <th>X</th>
        <th>Instagram</th>
        <th>TikTok</th>
        <th>Youtube</th>
        <th>Actions</th>
    </tr>
    <?php
    // Connexion à la base de données et récupération des enregistrements
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM enseignants";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td><img src='" . $row["photo"] . "' alt='Photo'></td>
                    <td>" . $row["type"] . "</td>
                    <td>" . $row["kode"] . "</td>
                    <td>" . $row["discipline"] . "</td>
                    <td>" . $row["telephone"] . "</td>
                    <td>" . $row["courriel"] . "</td>
                    <td>" . $row["residence"] . "</td>
                    <td>" . $row["linkedin"] . "</td>
                    <td>" . $row["x"] . "</td>
                    <td>" . $row["insta"] . "</td>
                    <td>" . $row["tiktok"] . "</td>
                    <td>" . $row["youtube"] . "</td>
                    <td>
                        <form action='edit_form.php' method='get'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='submit' value='Modifier'>
                        </form>
                        <form action='delete_record.php' method='post'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='submit' value='Supprimer'>
                        </form>
                    </td>
                  </tr>";
        }
    }
    $conn->close();
    ?>
</table>
