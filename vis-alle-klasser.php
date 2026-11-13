<?php

$db = mysqli_connect("localhost", "prg120vuser", "velg-et-passord-her", "prg120v");

$sqlSetning = "SELECT * FROM klasse";
$sqlResultat = mysqli_query($db, $sqlSetning);

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Vis alle klasser</title>
</head>
<body>

<h1>Alle klasser</h1>

<table border="1">

    <tr>
        <th>Klassekode</th>
        <th>Klassenavn</th>
        <th>Studiumkode</th>
    </tr>

    <?php

    while ($rad = mysqli_fetch_array($sqlResultat)) {

        echo "<tr>";
        echo "<td>" . $rad["klassekode"] . "</td>";
        echo "<td>" . $rad["klassenavn"] . "</td>";
        echo "<td>" . $rad["studiumkode"] . "</td>";
        echo "</tr>";

    }

    ?>

</table>

<p><a href="index.html">Tilbake til forsiden</a></p>

</body>
</html>