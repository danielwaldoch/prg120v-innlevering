<?php

$db = mysqli_connect("b-studentsql-1.usn.no", "dawal9465", "d038dawal9465", "dawal9465");

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