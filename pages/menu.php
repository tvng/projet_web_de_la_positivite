<?
//Je crois que la présence de ce session_start affiche la grosse erreur puisque ce fichier est include là où la session est déjà start
//session_start();
?>

<!-- HTML DU MENU  
    ce code va être "inclus" dans chaque page HTML
    c'est un seul code pour toutes les pages
     include ("menu.php"); 
     il suffit de le changer une fois ici pour que le changement
     soit effectif partout sur le site
-->
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #007179;">
<img src="../resources/logo.png" class="navbar-brand" width="20px">   
    <a class="navbar-brand" href="#">ECEperanto</a>
    <div class="container justify-content-end">
        <ul class="nav">
            <li class="nav-item">
                <!-- Redirige vers l'accueil du site -->
                <a class="nav-link" href="home.php">Accueil</a></li>
            <li class="nav-item">
                <!-- Redirige vers la section emploi du site -->
                <a class="nav-link" href="job.php">Emplois</a></li>
            <li class="nav-item">
                <!-- Redirige vers le réseau de l'utilisateur -->
                <a class="nav-link" href="network.php">Mon reseau</a></li>
            <li class="nav-item">
                <!-- Redirige vers la messagerie (dont les invitations d'amis) de l'utilisateur-->
                <a class="nav-link" href="messagerie.php">Messagerie</a></li>
            <li class="nav-item">
                <!-- Redirige vers les évenements de l'utilisateur-->
                <a class="nav-link" href="event.php">Notifications (event)</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#"  aria-haspopup="true" aria-expanded="false">Profil</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- Redirige vers le profil de l'utilisateur -->
                <a class="dropdown-item" href="profile.php">Mon profil</a>
                    <!-- Redirige vers les paramètres du site -->
                <a class="dropdown-item" href="settings.php">Paramètres</a>
                <div class="dropdown-divider"></div>
                    <!-- Pour se déconnecter de sa session -->
                <a class="dropdown-item" href="deconnexion.php">Se déconnecter</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

