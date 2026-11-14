<?php

$db = mysqli_connect("b-studentsql-1.usn.no", "dawal9465", "d038dawal9465", "dawal9465");

if (isset($_POST["slettKnapp"])) {

    $brukernavn = $_POST["brukernavn"];

    $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn'";
    mysqli_query($db, $sqlSetning);

    echo "Studenten er slettet.";
}

$sqlSetning = "SELECT * FROM student";
$sqlResultat = mysqli_query($db, $sqlSetning);

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Slett student</title>
</head>
<body>

<h1>Slett student</h1>

<form method="post" onsubmit="return confirm('Er du sikker?');">

    <p>
        Velg student:<br>

        <select name="brukernavn" required>

            <option value="">Velg student</option>

            <?php

            while ($rad = mysqli_fetch_array($sqlResultat)) {

                echo "<option value='" . $rad["brukernavn"] . "'>";
                echo $rad["brukernavn"] . " - " . $rad["fornavn"] . " " . $rad["etternavn"];
                echo "</option>";

            }

            ?>

        </select>

    </p>

    <input type="submit" name="slettKnapp" value="Slett student">

</form>

<p><a href="index.html">Tilbake til forsiden</a></p>

</body>
</html>