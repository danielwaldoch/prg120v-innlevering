<?php

$db = mysqli_connect("localhost", "prg120vuser", "velg-et-passord-her", "prg120v");

$sqlSetning = "SELECT * FROM student";
$sqlResultat = mysqli_query($db, $sqlSetning);

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Vis alle studenter</title>
</head>
<body>

<h1>Alle studenter</h1>

<table border="1">

    <tr>
        <th>Brukernavn</th>
        <th>Fornavn</th>
        <th>Etternavn</th>
        <th>Klassekode</th>
    </tr>

    <?php

    while ($rad = mysqli_fetch_array($sqlResultat)) {

        echo "<tr>";
        echo "<td>" . $rad["brukernavn"] . "</td>";
        echo "<td>" . $rad["fornavn"] . "</td>";
        echo "<td>" . $rad["etternavn"] . "</td>";
        echo "<td>" . $rad["klassekode"] . "</td>";
        echo "</tr>";

    }

    ?>

</table>

<p><a href="index.html">Tilbake til forsiden</a></p>

</body>
</html>