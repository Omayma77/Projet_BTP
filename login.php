<?php
include 'connexion.php';
error_reporting(0);
session_start();

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $req="Select * from login where email='$email' and password='$password'";
   $resultat=mysqli_query($connection,$req);
   $row=mysqli_num_rows($resultat);
    if ($row > 0) {
        $user = mysqli_fetch_assoc($resultat);
        
        // Stocker le nom et le prénom dans des variables de session
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
       header('location:./AdminPage.php');   
}
else{
    echo "<script type='text/javascript'>alert('echec')</script>" ;
}

}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
     <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/formulaire.css">
    <title>log in</title>
   
</head>
<body>
    
    <div class="circle"></div>
    <div class="card">
        <div class="logo">
        <img src="./images/logoweb.PNG" >
        </div>
       
        <form class="form" action="" method="post">
            <input type="email"  name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="submit">LOG IN</button>
        </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>

