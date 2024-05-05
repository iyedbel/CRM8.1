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
    <div class="container mx-auto my-8 px-1" id="gestion_clients">
        <h2 class="text-2xl font-bold mb-4">LISTE DES VENDEURS</h2>
        <a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 mb-4 inline-block" href="/CRM/creatvend.php" role="button">Ajouter un vendeur</a>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Prénom</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Téléphone</th>
                        <th class="px-4 py-2">Wilaya</th>
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
                    $sql = "SELECT * FROM vendeur";
                    $result = $conn->query($sql);

                    // Display clients data
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2'>" . $row["id"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["nom"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["prenom"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["email"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["telephone"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["wilaya"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["bureau"] . "</td>";
                            echo "<td class='px-4 py-2'>" . $row["date_creation"] . "</td>";
                            echo "<td class='px-4 py-2'>";
                            echo '<div class="flex">';
                            echo '<a class="btn btn-info mr-2 py-1 px-2 rounded-md bg-blue-500 text-white hover:bg-blue-600" href="/CRM/editvend.php?id=' . $row["id"] . '">Modifier</a>';
                            echo '<a class="btn btn-danger py-1 px-2 rounded-md bg-red-500 text-white hover:bg-red-600" href="/CRM/deletevend.php?id=' . $row["id"] . '">Supprimer</a>';                            echo '</div>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucun vendeur trouvé</td></tr>";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
