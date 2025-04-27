<?php
error_reporting(0);
include 'connexion.php';

$sql = "SELECT * FROM service";
$result = mysqli_query($connection,$sql);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BTP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/Acceuil.css">
  
  </head>
  <body >
    <nav>
      <label class="logo"><img src="images/logoweb.PNG"></label>
      <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#Services">Services</a></li>
        <li><a href="#our Team">Our Team</a></li>
        <li><a href="#contact-us">Contact Us</a></li>
        <a href="login.php" ><img src="images/icons8-admin-50 (1).png" class="ic3"></a>
      </ul>
    </nav>
    <div  id="home" class="img">
        
        <div class="txt1">
          <h1 >Votre vision<br>notre mission</h1>  
        </div>
        <div class="txt2">
          <h1>Qualité, durabilité<br>et professionnalisme </h1>
        </div>
        
          <span class="spn"><img src="images/pointing-sketch.jpg"  id="img1" ></span> 
      </div>
      <section id="our Team">
        <h2 class="ee">Notre Équipe</h2>
        <div class="section team">
  
            <div class="team-member">
                <img src="images/close-up-handsome-bearded-businessman.jpg" alt="Jean Dupont">
                <h3>Jean Dupont - Fondateur et Directeur Général</h3>
                <p>Avec plus de 25 ans d'expérience dans le secteur de la construction, Jean est le moteur de notre entreprise. Sa vision stratégique et son expertise technique ont permis à BTP Excellence de se hisser au premier rang des entreprises de construction dans la région.</p>
            </div>
            <div class="team-member">
                <img src="images/young-brunette-woman-white-smiling.jpg" alt="Marie Lefèvre">
                <h3>Marie Lefèvre - Co-fondatrice et Directrice des Opérations</h3>
                <p>Marie supervise toutes les opérations quotidiennes, assurant que chaque projet respecte les standards de qualité élevés de notre entreprise. Son attention aux détails et son approche axée sur le client sont essentielles à notre succès continu.</p>
            </div>
            <div class="team-member">
                <img src="images/indoor-portrait-pleased-handsome-ordinary-european-man-with-moustache-beard-smiling-broadly-feeling-confident-happy-while-making-arrangement-wedding-gray-wall.jpg" alt="Luc Martin">
                <h3>Luc Martin - Chef de Projet Senior</h3>
                <p>Expert en gestion de projets complexes, Luc a mené à bien certains de nos plus grands projets, en veillant à ce que chaque détail soit exécuté à la perfection. Son leadership et son expérience sont inestimables pour notre équipe.</p>
            </div>
            <div class="team-member">
                <img src="images/portrait-young-business-woman.jpg" alt="Sophie Durand">
                <h3>Sophie Durand - Architecte en Chef</h3>
                <p>Sophie apporte une perspective innovante et durable à nos projets architecturaux. Son talent pour le design et son engagement envers l'environnement font d'elle un pilier de notre équipe.</p>
            </div>
            <div class="team-member">
                <img src="images/front-view-handsome-corporate-man.jpg" alt="Marc Lefevre">
                <h3>Marc Lefevre - Responsable Qualité et Sécurité</h3>
                <p>Marc veille à ce que tous nos chantiers respectent les normes de sécurité les plus strictes et que nos constructions soient de la plus haute qualité. Son expertise garantit que chaque projet est réalisé en toute sécurité et selon les meilleurs standards.</p>
            </div>
        </div>
        
    </section>

    <section id="Services">
    <h2 class="ee">Nos Services</h2>
    <div class="section team">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='service'>";
                echo " <img src='data:image/jpeg;base64," . base64_encode($row["image"]) . "'>";
                echo "<h3>" . $row["nom"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo "</div>";
            }
            echo "</div>"; 
        } else {
            echo "<div>Aucun service trouvé</div>";
        }
        ?>
    </div>
</section>
      <!--project-section-->
      <section id="projects">
  <h2 class="ee">Nos Projets</h2>
  <div class="projects-container">
    <div class="project">
      <img src="images/2149304103.jpg" alt="Projet 1">
      <h3>Construction de l'Hôtel de Ville</h3>
      <p>Ce projet a consisté en la construction d'un nouvel Hôtel de Ville, terminé en 2021. L'édifice moderne de 5000 m² abrite les bureaux administratifs et une salle de conseil municipale.</p>
    </div>
    <div class="project">
      <img src="images/vertical-view-famous-pont-du-gard.jpg" alt="Projet 2" >
      <h3>Rénovation du Pont Central</h3>
      <p>Rénovation complète du Pont Central, une structure emblématique de la ville, achevée en 2019. Le projet comprenait le renforcement de la structure et l'amélioration des voies de circulation.</p>
    </div>
    <div class="project">
      <img src="images/promenade-canal-dubai-marina-with-luxury-skyscrapers-around-united-arab-emirates.jpg" alt="Projet 3">
      <h3>Construction de la Tour Résidentielle</h3>
      <p>Une tour résidentielle de 30 étages achevée en 2020, offrant des appartements de luxe avec une vue panoramique sur la ville. Le projet a mis l'accent sur l'utilisation de matériaux durables.</p>
    </div>
  </div>
</section>

<h1 id="about">À propos de nous</h1>
      
      <div class="section">
          <h2>Historique de l'entreprise</h2>
          <p>Fondée en 2005 par Jean Dupont et Marie Lefèvre, <strong>BTP Excellence</strong> a débuté comme une petite entreprise familiale spécialisée dans les travaux de rénovation résidentielle. Au fil des ans, grâce à notre engagement envers la qualité et la satisfaction de nos clients, nous avons évolué pour devenir une entreprise de construction reconnue dans toute la région. Aujourd'hui, nous offrons une gamme complète de services de construction, allant des projets résidentiels aux infrastructures commerciales et industrielles. </p>
      </div>

      <div class="section">
          <h2>Mission et vision</h2>
          <p><strong>Notre mission</strong> est de fournir des services de construction de haute qualité, en respectant les délais et les budgets, tout en assurant la sécurité et la satisfaction de nos clients. Nous nous engageons à utiliser les meilleures pratiques et technologies pour créer des bâtiments durables et respectueux de l'environnement.</p>
      </div>
   
      <!-- Contact Section -->
<div id="contact-us">
  <h1 id="contact">Contactez-nous</h1>
  <div class="contact-section">
    <div class="contact-item">
      <h2>Email</h2>
      <p>Btpexcellence@gmail.com</p>
    </div>
    <div class="contact-item">
      <h2>Téléphone</h2>
      <p>+33 1 23 45 67 89</p>
    </div>
    <div class="contact-item">
      <h2>Adresse</h2>
      <p>123 Rue de la Construction, 75001 Paris, France</p>
    </div>
  </div>
</div>



  </body>
</html>
<?php
mysqli_close($connection);
?>