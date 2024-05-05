<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Comptables</title>
    <!-- Ajoutez Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Ajoutez Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto my-8 px-4" id="gestion-comptable">
        <h2 class="text-2xl font-bold mb-4">LISTE DES COMPTABLES</h2>
        <a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mt-6 inline-block" href="/CRM/creat1.php" role="button">Ajouter colis</a>
        <!-- Sélecteur d'options centré -->
        <div class="flex justify-end mb-4">
            <select id="statusSelect" class="px-4 py-2 border border-gray-300 rounded-md" onchange="updateOptionColumn(this)">
                <option value="all">Tous</option>
                <option value="echec">Échec</option>
                <option value="attente">En attente</option>
                <option value="cours">En cours</option>
                <option value="termine">Terminé</option>
            </select>
        </div>
        <!-- 16 boxes avec différents statuts -->
        <div class="grid grid-cols-4 gap-4 mb-8">
            <!-- Boxes statut -->
            <a href="#?status=Échec" class="bg-red-500 text-white p-4 rounded-md h-full">Échec</a>
            <a href="#?status=en attente" class="bg-yellow-500 text-white p-4 rounded-md h-full">En attente</a>
            <a href="#?status=en cours" class="bg-blue-500 text-white p-4 rounded-md h-full">En cours</a>
            <a href="#?status=termine" class="bg-green-500 text-white p-4 rounded-md h-full">Terminé</a>
            <a href="#?status=Échec" class="bg-red-500 text-white p-4 rounded-md h-full">Échec</a>
            <a href="#?status=en attente" class="bg-yellow-500 text-white p-4 rounded-md h-full">En attente</a>
            <a href="#?status=en cours" class="bg-blue-500 text-white p-4 rounded-md h-full">En cours</a>
            <a href="#?status=termine" class="bg-green-500 text-white p-4 rounded-md h-full">Terminé</a>
            <a href="#?status=Échec" class="bg-red-500 text-white p-4 rounded-md h-full">Échec</a>
            <a href="#?status=en attente" class="bg-yellow-500 text-white p-4 rounded-md h-full">En attente</a>
            <a href="#?status=en cours" class="bg-blue-500 text-white p-4 rounded-md h-full">En cours</a>
            <a href="#?status=termine" class="bg-green-500 text-white p-4 rounded-md h-full">Terminé</a>
            <a href="#?status=Échec" class="bg-red-500 text-white p-4 rounded-md h-full">Échec</a>
            <a href="#?status=en attente" class="bg-yellow-500 text-white p-4 rounded-md h-full">En attente</a>
            <a href="#?status=en cours" class="bg-blue-500 text-white p-4 rounded-md h-full">En cours</a>
            <a href="#?status=termine" class="bg-green-500 text-white p-4 rounded-md h-full">Terminé</a>
        </div>
        <!-- Tableau de données -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Wilaya</th>
                        <th class="px-4 py-2">Wilaya Destination</th>
                        <th class="px-4 py-2">Produit</th>
                        <th class="px-4 py-2">Vendeur</th>
                        <th class="px-4 py-2">Prix Total</th>
                        <th class="px-4 py-2">status</th>
                        <th class="px-4 py-2">option</th>
                        <th class="px-4 py-2">Date De Creation</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Données des colis -->
                    <?php
                    // Database credentials
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "fichier";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to fetch colis data with the seller's name
                    $sql = "SELECT colis.*, vendeur.nom AS nom_vendeur 
                            FROM colis 
                            INNER JOIN vendeur ON colis.id_vendeur = vendeur.id";
                    $result = $conn->query($sql);

                    // Display colis data including the seller's name
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2'>" . $row["id"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["wilaya"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["wilaya_destination"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["id_produit"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["nom_vendeur"] . "</td>"; // Display the seller's name
                            echo "<td class='px-4 py-2'>" . $row["prix_total"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["status"] . "</td>"; // Display the status
                            echo "<td class='optionColumn px-4 py-2'>" . $row["status"] . "</td>"; // Placeholder for option column
                            echo "<td class='px-4 py-2'>" . $row["date_creation"] . "</td>";
                            echo "<td class='px-4 py-2'>";
                            echo '<div class="flex">';
                            echo '<a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600" href="/CRM/editcompt.php?id=' . $row["id"] . '">Modifier</a>';
                            echo '<a class="btn btn-danger py-1 px-2 rounded-md bg-red-500 text-white hover:bg-red-600" href="/CRM/deletecomp.php?id=' . $row["id"] . '">Supprimer</a>';
                            echo '<button class="btn btn-secondary py-1 px-2 rounded-md bg-gray-500 text-white hover:bg-gray-600" onclick="showParams(' . htmlspecialchars(json_encode($row)) . ')"><i class="fas fa-cog"></i></button>'; // Icone de paramètre
                            echo '</div>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Aucun comptable trouvé</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Bouton "Ajouter colis" en bas -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function updateOptionColumn(select) {
            // Sélectionnez toutes les cellules de la colonne "option"
            var optionCells = document.querySelectorAll('.optionColumn');
            // Parcourez chaque cellule et mettez à jour son contenu avec la valeur sélectionnée dans le select
            optionCells.forEach(function(cell) {
                cell.textContent = select.value;
            });
        }
    </script>
</body>

</html>
