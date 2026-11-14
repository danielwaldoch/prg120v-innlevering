<?php

if (isset($_POST["registrerKnapp"])) {

    $db = mysqli_connect("b-studentsql-1.usn.no", "dawal9465", "d038dawal9465", "dawal9465");

    $klassekode = $_POST["klassekode"];
    $klassenavn = $_POST["klassenavn"];
    $studiumkode = $_POST["studiumkode"];

    $sqlSetning = "SELECT * FROM klasse WHERE klassekode='$klassekode'";
    $sqlResultat = mysqli_query($db, $sqlSetning);

    if (mysqli_num_rows($sqlResultat) == 0) {

        $sqlSetning = "INSERT INTO klasse VALUES ('$klassekode', '$klassenavn', '$studiumkode')";
        mysqli_query($db, $sqlSetning);

        echo "Klassen er registrert.";

    } else {

        echo "Klassekoden finnes allerede.";

    }
}

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrer klasse</title>
</head>
<body>

<h1>Registrer klasse</h1>

<form method="post">

    <p>
        Klassekode:<br>
        <input type="text" name="klassekode" required>
    </p>

    <p>
        Klassenavn:<br>
        <input type="text" name="klassenavn" required>
    </p>

    <p>
        Studiumkode:<br>
        <input type="text" name="studiumkode" required>
    </p>

    <input type="submit" name="registrerKnapp" value="Registrer klasse">

</form>

<p><a href="index.html">Tilbake til forsiden</a></p>

</body>
</html>