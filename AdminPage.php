<?php
error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AdminPage</title>
  <link rel="stylesheet" href="style22.css">
 
</head>
<body>

<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
      <img src="images/logoweb.PNG" alt="Logo">
    </div>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="#" onclick="showHome()">Home</a></li>
        <li class="drop-down"><a href="#">Gestion des services<i class='bx bxs-down-arrow'></i></a> 
          <ul>
            <li><a href="#" onclick="showPage('ConsulterSer.php')">Consulter les services</a></li>
            <li><a href="#" onclick="showPage('insert.php')">Ajouter un service</a></li>
            <li><a href="#" onclick="showPage('ModifierService.php')">Modifier un service</a></li>
            <li><a href="#" onclick="showPage('Supprimer_service.php')">Supprimer un service</a></li>
          </ul>
        </li>
        <li class="drop-down"><a href="acceuil.php">Revenir vers la page principale<i class='bx bxs-down-arrow'></i></a> 
          
        </li>
        <li><a href="login.php">Déconnexion</a></li>  
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header>
<section id="home" style="display: none;">
  
  <?php
session_start();

if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    echo "<h1>Bienvenue, $prenom $nom!</h1>";
} else {
   
}
?>
  <img src="images/undraw_Add_notes_re_ln36.png" alt="Image indisponible" id="img" width="900" height="400">
</section>

<div id="content" style="display: none;"></div>

<script>
  function showHome() {
    document.getElementById('home').style.display = 'block';
    document.getElementById('content').style.display = 'none';
  }

  function showPage(page) {
    document.getElementById('home').style.display = 'none';
    document.getElementById('content').style.display = 'block';
    fetch(page)
      .then(response => response.text())
      .then(data => {
        document.getElementById('content').innerHTML = data;
      })
      .catch(error => console.error('Error loading the page:', error));
  }
  document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');

    if (message) {
      alert(message);
    }
  });

  showHome();
</script>

</body>
</html>
