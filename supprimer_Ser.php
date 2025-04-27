<?php
include 'connexion.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $req="DELETE FROM service where id='$id'";
    $resultat=mysqli_query($connection,$req);
    if($resultat){
        header("Location: AdminPage.php?message=Service supprimé avec succès");
        exit();
    }
    else{
        header("Location: AdminPage.php?message=Erreur lors de la suppression");
        exit();
    }
    mysqli_free_result($resultat);
    mysqli_close($connection);
}



?>
