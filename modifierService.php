<?php
include 'connexion.php';

$sql = "SELECT * FROM service";
$result = mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Services</title>
</head>
<body>
    <h1>Liste des Services</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["description"] . "</td>";
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' width='100' /></td>";
                echo "<td><a href='Modif_service_form.php?id=" . $row["id"] . "'>Modifier</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucun service trouvé</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$connection->close();
?>
