<?php
include 'connexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM service WHERE id = $id";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Service non trouvé.";
        exit;
    }
} else {
    echo "ID non fourni.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Service</title>
    <link rel="stylesheet" href="./CSS/modifier.css">
</head>
<body>
    <h1>Modifier Service</h1>
    <form action="modif.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="<?php echo $row['nom']; ?>"><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description"><?php echo $row['description']; ?></textarea><br>

        <label for="image">Image actuelle:</label>
        <img src='data:image/jpeg;base64,<?php echo base64_encode($row["image"]); ?>' width='100'><br>

        <label for="image">Nouvelle image (laisser vide pour ne pas changer):</label>
        <input type="file" name="image" id="image"><br>

        <input type="submit" value="Mettre à jour" name="modifier">
    </form>
</body>
</html>

<?php
$connection->close();
?>
