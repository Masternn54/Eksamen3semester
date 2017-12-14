<?php
/**
 * Created by PhpStorm.
 * User: Nichlas
 * Date: 14-12-2017
 * Time: 09:37
 */

?>

<!DOCTYPE html>
<html>
<head>
    <!-- linket er fra bootstrap og det henter deres css stylesheet unden man skal downloaded det -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<!-- her laver jeg et form tag hvor jeg har mit username og password felter
 og en knap til at submitte dem og success nede i btn er farven grøn danger er rød-->
<form action="Database.php" method="post">
    <input class="form-control" type="text"  name="username" placeholder="Username">
    <input class="form-control" type="password" name="password" placeholder="Password">
    <button class="btn btn-success" type="submit">enter</button>

</form>
</body>
</html>