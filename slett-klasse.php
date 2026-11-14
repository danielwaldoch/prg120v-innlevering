<?php

$db = mysqli_connect("b-studentsql-1.usn.no", "dawal9465", "d038dawal9465", "dawal9465");

if (isset($_POST["slettKnapp"])) {

    $klassekode = $_POST["klassekode"];

    $sqlSetning = "SELECT * FROM student WHERE klassekode='$klassekode'";
    $sqlResultat = mysqli_query($db, $sqlSetning);

    if (mysqli_num_rows($sqlResultat) == 0) {

        $sqlSetning = "DELETE FROM klasse WHERE klassekode='$klassekode'";
        mysqli_query($db, $sqlSetning);

        echo "Klassen er slettet.";

    } else {

        echo "Klassen kan ikke slettes fordi den har studenter.";

    }
}

$sqlSetning = "SELECT * FROM klasse";
$sqlResultat = mysqli_query($db, $sqlSetning);

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Slett klasse</title>
</head>
<body>

<h1>Slett klasse</h1>

<form method="post" onsubmit="return confirm('Er du sikker?');">

    <p>
        Velg klasse:<br>

        <select name="klassekode" required>

            <option value="">Velg klasse</option>

            <?php

            while ($rad = mysqli_fetch_array($sqlResultat)) {

                echo "<option value='" . $rad["klassekode"] . "'>";
                echo $rad["klassekode"] . " - " . $rad["klassenavn"];
                echo "</option>";

            }

            ?>

        </select>

    </p>

    <input type="submit" name="slettKnapp" value="Slett klasse">

</form>

<p><a href="index.html">Tilbake til forsiden</a></p>

</body>
</html>