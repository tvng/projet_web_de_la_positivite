<?
session_start();
?>

<!-- HTML DU MENU  
    ce code va être "inclus" dans chaque page HTML
    c'est un seul code pour toutes les pages
     include ("menu.php"); 
     on le change une seule fois comme ça
-->

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #007179;">
    <div class="container justify-content-end">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Accueil</a></li>
            <li class="nav-item">
                <a class="nav-link" href="job.php">Emplois</a></li>
            <li class="nav-item">
                <a class="nav-link" href="network.php">Mon reseau</a></li>
          <!--  <li class="nav-item">
                <a class="nav-link" href="#">Messagerie</a></li> 
            -->
            <li class="nav-item">
                <a class="nav-link" href="event.php">Notifications (event)</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#"  aria-haspopup="true" aria-expanded="false">Profil</a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.php">Mon profil</a>
                <a class="dropdown-item" href="settings.php">Paramètres</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Se déconnecter</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

