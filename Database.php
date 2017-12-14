<?php
/**
 * Created by PhpStorm.
 * User: Nichlas
 * Date: 14-12-2017
 * Time: 08:38
 */
//Database.php hed originalt index.php men blev omdøbt fordi jeg skulle
// lave en login i stedet og jeg vil gerne henvise til den først
// når jeg starter programmet


// en if statement der siger at hvis username eller
// password ikke er korrekt så skriver den ud at der er fejl
// og der bliver også lavet en knap hvor man kan gå tilbage og prøve igen

// mit username er admin og mit password er 1234 hvis i vil checke om loginet virker
if ($_POST["username"] != "admin" || $_POST["password"] != "1234"){

    // hvis man skriver username eller password forkert så
    // kommer der noget tekst op der siger at du har skrevet det forkert
    // plus en knap der sender dig tilbage til siden hvor du kan indtast
    // igen hvis du klikker på den.
    ?>

    Username or password not correct go back and try again
    <button onclick="window.history.back()"> Try again</button>
    <?php
    exit();
}

//connectionen til databasen
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

// Create connection og hvis der kommer en fejl så printer den ud at der er en fejl
$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );

// mit join som også skal stå i vores sql de 2 left join er en advanceret opgave 1
$select = "SELECT  tourName, description,price,keywords FROM tours

LEFT JOIN packages ON tours.packageId = tours.packageId";



//den første linje laver en prepare statement
// den anden linje executer
// den tredje linje henter dataen asociative dvs man for et array tilbage der asociative
$result = $conn->prepare($select);
$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<head>
    <!-- linket er fra bootstrap og det henter deres css stylesheet unden man skal downloaded det -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- script tagget er brugt til at forbinde med mit javascript som indeholder sortable -->
    <script src="Sortable.js">

    </script>
</head>
<body>
<!-- her laver jeg en table classe med 6 table heads som opgaven nævner -->
<table class="table sortable">
    <thead>
    <tr>
        <!-- her i table head (th) laver jeg en overskrift for hver af de
         tabeller der skal bruges -->

        <th>tourName</th>
        <th>description</th>
        <th>price</th>
        <th>keywords</th>
        <th>packageId</th>

    </tr>

    </thead>
    <tbody>

    <?php
    // for hvert result der er bliver sat ind som en række dvs at ord id for en rækkes osv.
    foreach ($result as $row) : ?>
        <tr>
            <!-- her henter jeg data fra tabellerne og sætter dem ind i rows/rækker -->

            <td><?= $row['tourName'] ?> </td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['keywords'] ?></td>
            <td><?= $row['packageId'] ?></td>

        </tr>
    <?php endforeach; ?>

    </tbody>
</table>



</body>
</html>
