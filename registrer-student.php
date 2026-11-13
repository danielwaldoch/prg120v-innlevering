<?php

$db = mysqli_connect("localhost", "prg120vuser", "velg-et-passord-her", "prg120v");

if (isset($_POST["registrerKnapp"])) {

    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn'";
    $sqlResultat = mysqli_query($db, $sqlSetning);

    if (mysqli_num_rows($sqlResultat) == 0) {

        $sqlSetning = "INSERT INTO student VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";
        mysqli_query($db, $sqlSetning);

        echo "Studenten er registrert.";

    } else {

        echo "Brukernavnet finnes allerede.";

    }
}

$sqlSetning = "SELECT * FROM klasse";
$sqlResultat = mysqli_query($db, $sqlSetning);

?>

<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <title>Registrer student</title>
</head>
<body>

<h1>Registrer student</h1>

<form method="post">

    <p>
        Brukernavn:<br>
        <input type="text" name="brukernavn" required>
    </p>

    <p>
        Fornavn:<br>
        <input type="text" name="fornavn" required>
    </p>

    <p>
        Etternavn:<br>
        <input type="text" name="etternavn" required>
    </p>

    <p>
        Klasse:<br>
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

    <input type="submit" name="registrerKnapp" value="Registrer student">

</form>

<p><a href="index.html">Tilbake til forsiden</a></p>

</body>
</html>