<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Ajoutez Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto my-8 px-4" id="gestion_clients">
        <h2 class="text-2xl font-bold mb-4">LISTE DES LIVREURS</h2>
        <a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block" href="/CRM/creatlivr.php" role="button">Ajouter un livreur</a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Téléphone</th>
                        <th class="px-4 py-2">Bureau</th>
                        <th class="px-4 py-2">date_creation</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Données des clients -->
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

                    // Query to fetch clients data
                    $sql = "SELECT * FROM livreur";
                    $result = $conn->query($sql);

                    // Check if the query executed successfully
                    if (!$result) {
                        die("Error executing the query: " . $conn->error);
                    }

                    // Display clients data
                    if ($result->num_rows > 0) {
                        $count = 0;
                        while ($row = $result->fetch_assoc()) {
                            // Alternance des couleurs de fond des lignes
                            $rowClass = ($count % 2 == 0) ? 'bg-gray-100' : 'bg-gray-200';
                            echo "<tr class='$rowClass border-b'>";
                            echo "<td class='px-4 py-2'>" . $row["id"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["nom"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["prenom"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["email"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["telephone"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["bureau"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["date_creation"] . "</td>";
                            echo "<td class='px-4 py-2'>";
                            echo '<div class="flex">';
                            echo '<a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600" href="/CRM/editlivr.php?id=' . $row["id"] . '">Modifier</a>';
                            echo '<a class="btn btn-danger py-1 px-2 rounded-md bg-red-500 text-white hover:bg-red-600" href="/CRM/deletelivr.php?id=' . $row["id"] . '" onclick="return confirmDelete()">Supprimer</a>';
                            echo '</div>';
                            echo "</td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucun livreur trouvé</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ajoutez le script JavaScript -->
    <script>
        function confirmDelete() {
            return confirm("Êtes-vous sûr de vouloir supprimer ce client ?");
        }
    </script>
</body>

</html>
