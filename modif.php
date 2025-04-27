<?php
include 'connexion.php';

// Afficher les erreurs pendant le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
    $id = intval($_POST['id']); // Sécuriser l'ID
    $nom = mysqli_real_escape_string($connection, $_POST['nom']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    // Initialisation de la requête SQL
    $sql = ""; // Initialiser la variable

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $sql = "UPDATE service SET nom = '$nom', description = '$description', image = '$image' WHERE id = $id";
    } else {
        $sql = "UPDATE service SET nom = '$nom', description = '$description' WHERE id = $id";
    }

    // Vérifier si la requête SQL n'est pas vide
    if (!empty($sql)) {
        // Exécution de la requête SQL
        if (mysqli_query($connection, $sql)) {
            header("Location: AdminPage.php?message=Service Modifié avec succès");
            exit();
        } else {
            header("Location: AdminPage.php?message=Erreur lors Modifié de la Modification");
            exit();
        }
    } else {
        echo "Erreur: La requête SQL est vide.";
    }
} else {
    echo "Méthode non autorisée.";
}

mysqli_close($connection);
?>
