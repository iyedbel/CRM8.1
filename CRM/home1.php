<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>

    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/kxp_fav.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Styles for centering the message */
        .center-message {
            position: fixed;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }
        .logo-name{
            font-size: 15px;
            font-weight: 600;
        }
        /* Styles for the circular profile image */
        .profile-link {
            position: fixed;
            top: 20px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
        }

        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

      /* Styles for the profile modal */
.profile-modal {
    display: none;
    position: fixed;
    top: 80px;
    right: 17px;
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    padding: 20px;
    width: 200px; /* Ajustez la largeur selon vos besoins */
    animation: slideInRight 0.3s ease forwards; /* Animation d'apparition */
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.profile-info {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.profile-info img {
    width: 50px; /* Ajustez la taille de l'image de profil */
    height: 50px;
    border-radius: 50%; /* Pour un aspect arrondi */
    object-fit: cover; /* Pour couvrir la zone avec l'image */
    margin-right: 10px;
}

.username {
    font-weight: bold;
    font-size: 16px; /* Ajustez la taille de la police */
}

.profile-links a {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    text-decoration: none;
    color: #333;
}

.profile-links a i {
    margin-right: 5px; /* Espace entre l'icône et le texte */
}

.profile-links a:hover {
    color: #007bff; /* Couleur au survol */
}

    </style>
</head>

<body>

    <div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxl-xing'></i>
            <div class="logo-name">Welcome, <?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : 'User'; ?></div>
        </a>
        <a href="#" class="profile-link">
            <img src="assets/img/img.png" alt="Profile Image" class="profile-image">
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Gestion Utilisateurs</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Gestion Utilisateurs</a>
                    <a href="#" class="link gestion-admins" >Gestion Admins</a>
                    <a href="#" class="link gestion-clients">Gestion Clients</a>
                    <a href="#" class="link gestion-comptables">Gestion Comptables</a>
                    <a href="#" class="link gestion-vendeur">Gestion Vendeurs</a>
                    <a href="#" class="link">Gestion Commandes</a>
                    <a href="#" class="link gestion-livreur">Gestion Livreurs</a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link gestion-colis">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Gestion des colis</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Chart</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-compass'></i>
                        <span class="name">Explore</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-history'></i>
                        <span class="name">History</span>
                    </a>
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-cog'></i>
                        <span class="name">parametres</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>

    <!-- Boîte modale pour afficher les informations de l'utilisateur -->
    <div class="profile-modal" style="display: none;">
        <div class="profile-info">
        <img src="assets/img/img.png" alt="Profile Image" class="profile-image" id="profileImage">
            <span class="username"><?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : 'User'; ?></span>
        </div>
        <div class="profile-links">
            <!-- Ajoutez des icônes à gauche des liens -->
            <a href="profil.php"><i class="bx bx-user"></i> Gérer Profil</a>
            <a href="logout.php"><i class="bx bx-log-out"></i> Déconnexion</a>
        </div>
    </div>

    <!-- ============= Home Section =============== -->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">CRM</div>
        </div>
    </section>
    <script>
        // Fonction pour afficher la boîte de confirmation
        function showConfirmationBox(clientId) {
            // Affichez une boîte de confirmation avec deux boutons "Ok" et "Annuler"
            const confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce client ?");
            if (confirmation) {
                // Si l'utilisateur clique sur "Ok", redirigez-le vers la page de suppression du client avec l'identifiant
                window.location.href = '/CRM/delete.php?id=' + clientId;
            }
        }

        // Sélectionnez tous les liens "Supprimer"
        const deleteClientLinks = document.querySelectorAll('.delete-client');

        // Ajoutez un gestionnaire d'événements à chaque lien "Supprimer"
        deleteClientLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                // Empêchez le comportement par défaut du lien
                event.preventDefault();
                // Obtenez l'identifiant du client à supprimer à partir de l'attribut data-id
                const clientId = this.getAttribute('data-id');
                // Appelez la fonction pour afficher la boîte de confirmation
                showConfirmationBox(clientId);
            });
        });
    </script>

   <!-- JavaScript pour charger le contenu de index1.php -->
<script>
    // Fonction AJAX pour charger le contenu de index1.php
    function loadIndex1Content() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Supprimer le contenu de index2.php s'il existe
                var centerMessage2 = document.querySelector('.center-message-2');
                var centerMessage6 = document.querySelector('.center-message-3');
                var centerMessages = document.querySelector('.center-message-4');

                if (centerMessage2) {
                    centerMessage2.remove();
                }
                if (centerMessage6) {
                    centerMessage6.remove();
                }
                if (centerMessages) {
                    centerMessages.remove();
                }
                // Créer et ajouter le contenu de index1.php
                var centerMessage = document.createElement('div');
                centerMessage.classList.add('center-message', 'center-message-1'); // Ajouter une classe spécifique pour identifier le contenu de index1.php
                centerMessage.innerHTML = this.responseText;
                document.body.appendChild(centerMessage);
            }
        };
        xhttp.open("GET", "index1.php", true);
        xhttp.send();
    }

    // Sélectionnez le lien "Gestion Clients"
    var gestionClientsLink = document.querySelector('.gestion-clients');

    // Ajoutez un gestionnaire d'événements pour détecter le clic sur le lien "Gestion Clients"
    gestionClientsLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadIndex1Content();
    });
</script>


    <!-- JavaScript pour afficher la boîte modale -->
    <script>
        const profileLink = document.querySelector('.profile-link');
        const profileModal = document.querySelector('.profile-modal');

        profileLink.addEventListener('click', (event) => {
            event.preventDefault();
            profileModal.style.display = 'block';
        });
    </script>

    <script>
        const listItems = document.querySelectorAll(".sidebar-list li");

        listItems.forEach((item) => {
            item.addEventListener("click", () => {
                let isActive = item.classList.contains("active");

                listItems.forEach((el) => {
                    el.classList.remove("active");
                });

                if (!isActive) item.classList.add("active");
            });
        });

        const toggleSidebar = document.querySelector(".toggle-sidebar");
        const logo = document.querySelector(".logo-box");
        const sidebar = document.querySelector(".sidebar");

        toggleSidebar.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });

        logo.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
       <script>
    // Fonction AJAX pour charger le contenu de index2.php
    function loadIndex2Content() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Supprimer le contenu de index1.php s'il existe
                var centerMessage1 = document.querySelector('.center-message-1');
                var centerMessage5 = document.querySelector('.center-message-3');
                var centerMessages = document.querySelector('.center-message-4');

                if (centerMessage1) {
                    centerMessage1.remove();
                }
                if (centerMessage5) {
                    centerMessage5.remove();
                }
                if (centerMessages) {
                    centerMessages.remove();
                }
                // Créer et ajouter le contenu de index2.php
                var centerMessage = document.createElement('div');
                centerMessage.classList.add('center-message', 'center-message-2'); // Ajouter une classe spécifique pour identifier le contenu de index2.php
                centerMessage.innerHTML = this.responseText;
                document.body.appendChild(centerMessage);
            }
        };
        xhttp.open("GET", "index2.php", true);
        xhttp.send();
    }

    // Sélectionnez le lien "Gestion Admins"
    var gestionAdminsLink = document.querySelector('.gestion-admins');

    // Ajoutez un gestionnaire d'événements pour détecter le clic sur le lien "Gestion Admins"
    gestionAdminsLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadIndex2Content();
    });
</script>

<script>
    // Fonction AJAX pour charger le contenu de index2.php
    function loadIndex3Content() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Supprimer le contenu de index1.php s'il existe
                var centerMessage1 = document.querySelector('.center-message-1');
                var centerMessage4 = document.querySelector('.center-message-4');

                if (centerMessage1) {
                    centerMessage1.remove();
                }
                if (centerMessage4) {
                    centerMessage4.remove();
                }
                // Créer et ajouter le contenu de index2.php
                var centerMessage = document.createElement('div');
                centerMessage.classList.add('center-message', 'center-message-3'); // Ajouter une classe spécifique pour identifier le contenu de index2.php
                centerMessage.innerHTML = this.responseText;
                document.body.appendChild(centerMessage);
            }
        };
        xhttp.open("GET", "indexcomp.php", true);
        xhttp.send();
    }

    var gestioncomptsLink = document.querySelector('.gestion-comptables');

    // Ajoutez un gestionnaire d'événements pour détecter le clic sur le lien "Gestion Admins"
    gestioncomptsLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadIndex3Content();
    });
    function loadSectionFromUrl() {
    // Get the hash part of the URL
    var hash = window.location.hash;

    // Check if the hash is not empty
    if (hash) {
        // Remove the "#" character from the hash
        var sectionName = hash.substring(1);

        // Check if the sectionName matches the name of the hidden section
        if (sectionName === 'gestion-comptable') {
            // Call the loadgestion() function
            loadIndex3Content();
        }
    }
}
// Call the function when the page loads
window.onload = loadSectionFromUrl;
</script>
<script>
    // Fonction AJAX pour charger le contenu de indexvend.php
    function loadIndex4Content() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Supprimer le contenu de index1.php s'il existe
                var centerMessage1 = document.querySelector('.center-message-1');
                
                if (centerMessage1) {
                    centerMessage1.remove();
                }
                // Créer et ajouter le contenu de index2.php
                var centerMessage3 = document.createElement('div');
                centerMessage3.classList.add('center-message', 'center-message-4'); // Ajouter une classe spécifique pour identifier le contenu de index2.php
                centerMessage3.innerHTML = this.responseText;
                document.body.appendChild(centerMessage3);
            }
        };
        xhttp.open("GET", "indexvend.php", true);
        xhttp.send();
    }

    // Sélectionnez le lien "Gestion Admins"
    var gestionvendeursLink = document.querySelector('.gestion-vendeur');

    // Ajoutez un gestionnaire d'événements pour détecter le clic sur le lien "Gestion vend"
    gestionvendeursLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadIndex4Content();
    });
</script>
<script>
    // Fonction AJAX pour charger le contenu de index2.php
    function loadIndex5Content() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Supprimer le contenu de index1.php s'il existe
                var centerMessage1 = document.querySelector('.center-message-1');
                var centerMessagees = document.querySelector('.center-message-2');
                if (centerMessage1) {
                    centerMessage1.remove();
                }
                if (centerMessagees) {
                    centerMessagees.remove();
                }
                // Créer et ajouter le contenu de index2.php
                var centerMessage = document.createElement('div');
                centerMessage.classList.add('center-message', 'center-message-5'); // Ajouter une classe spécifique pour identifier le contenu de index2.php
                centerMessage.innerHTML = this.responseText;
                document.body.appendChild(centerMessage);
            }
        };
        xhttp.open("GET", "indexlivr.php", true);
        xhttp.send();
    }

    // Sélectionnez le lien "Gestion Admins"
    var gestionAdminsLink = document.querySelector('.gestion-livreur');

    // Ajoutez un gestionnaire d'événements pour détecter le clic sur le lien "Gestion Admins"
    gestionAdminsLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadIndex5Content();
    });
</script>
<script>
    // Fonction AJAX pour charger le contenu de index2.php
    function loadIndex6Content() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Supprimer le contenu de index1.php s'il existe
                var centerMessage1 = document.querySelector('.center-message-1');
                var centerMessagees = document.querySelector('.center-message-2');
                if (centerMessage1) {
                    centerMessage1.remove();
                }
                if (centerMessagees) {
                    centerMessagees.remove();
                }
                // Créer et ajouter le contenu de index2.php
                var centerMessagez = document.createElement('div');
                centerMessagez.classList.add('center-message', 'center-message-6'); // Ajouter une classe spécifique pour identifier le contenu de index2.php
                centerMessagez.innerHTML = this.responseText;
                document.body.appendChild(centerMessagez);
            }
        };
        xhttp.open("GET", "indexcolis.php", true);
        xhttp.send();
    }

    // Sélectionnez le lien "Gestion colis"
    var gestioncolisLink = document.querySelector('.gestion-colis');

    // Ajoutez un gestionnaire d'événements pour détecter le clic sur le lien "Gestion colis"
    gestioncolisLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadIndex6Content();
    });
</script>
</body>

</html>



