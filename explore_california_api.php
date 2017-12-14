<?php
/**
 * Created by PhpStorm.
 * User: nichlas
 * Date: 08-12-2017
 * Time: 09:30
 */


//connectionen til databasen
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "explorecalifornia";

// Create connection og hvis der kommer en fejl så printer den ud at der er en fejl
$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );

// mit join som også skal stå i vores sql left join er en advanceret opgave 1
$select = "SELECT tourName, description,price, keywords FROM tours

LEFT JOIN packages ON tours.packageId = tours.packageId";

//den første linje laver en prepare statement
// den anden linje executer
// den tredje linje henter dataen asociative dvs man for et array tilbage der asociative
$result = $conn->prepare($select);
$result->execute();
$result = $result->fetchAll(PDO::FETCH_ASSOC);


// echo printer $result ud som en json for at se om det virker skal du åbne chrome og
// skrive local host vælge mappen din opgave ligger i og derefter stien = localhost/mappen/json_api.php
echo json_encode($result);




// opgave 6 hvordan kan man lave en api om til en restfull api
//REST referere til http (hypertext transfer protocol) og hvordan man bruger det
//idet at man kan bruge GET http metode på en url for at få information
// eller POST http metode for at lave nye items på ens server
// PUT for at editere existerene items.
// delete for at slette ting
