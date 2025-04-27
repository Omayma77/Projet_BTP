<?php
error_reporting(0);
include 'connexion.php';

if (isset($_POST['ajouter'])) {
    extract($_POST);

   
    $nom = mysqli_real_escape_string($connection, $nom);
    $description = mysqli_real_escape_string($connection, $description);

    // Vérifier si un fichier image a été téléchargé
    if (isset($_FILES['image']) AND $_FILES['image']['error'] === 0) {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $image = mysqli_real_escape_string($connection, $image);

        
        $req = "INSERT INTO service (nom, description, image) VALUES ('$nom', '$description', '$image')";
        $result = mysqli_query($connection, $req);
        if ($result) {
            header('location:./AdminPage.php?message=Enregistrement du service avec succés!');
            exit();
        
        } else {
            header("Location: AdminPage.php?message=Erreur lors de l'ajout Réssayer");
            exit();
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
        echo "Erreur: " . $_FILES['image']['error'];
    }
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Service</title>
    <link rel="stylesheet" href="./CSS/inserer.css">
</head>
<body>
    <h1>Ajouter un Nouveau Service</h1>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <br>
        <label for="description">Description :</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <label for="image">Image :</label>
        <input type="file" name="image" id="image" required>
        <br>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>
</body>
</html>
