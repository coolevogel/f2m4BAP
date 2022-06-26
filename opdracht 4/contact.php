<?php
require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';
$datum = date('Y-m-d h:i:s');


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];

    $sql = "INSERT INTO `forms` (`voornaam`, `achternaam`, `email`, `bericht`, `datum`)
            VALUES (:voornaam, :achternaam, :email, :bericht, :datum);";
    $statement = $connection->prepare($sql);   
    $params = [
        'voornaam' => $voornaam,
        'achternaam' => $achternaam,
        'email' => $email,
        'bericht' => $bericht,
        'datum' => $datum
    ];
    $statement->execute($params);
}   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bap opdracht 4</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="contact">
        <header>
            <h2>have a question?</h2>
        </header>

        <form action="contact.php" method="POST">
            <div class="form__field">
                <label for="voornaam">voornaam</label>
                <input type="text" id="voornaam" name="voornaam" placeholder="voornaam" required>
            </div>
            <div class="form__field">
                <label for="achternaam">achternaam</label>
                <input type="text" id="achternaam" name="achternaam" placeholder="achternaam" required>
            </div>
            <div class="form__field">
                <label for="email">email</label>
                <input type="email" id="email" name="email" placeholder="email" required>
            </div>
            <div class="form__field">
                <label for="bericht">bericht</label>
                <textarea id="bericht" name="bericht" placeholder="bericht" required></textarea>
            </div>
            <button type="submit" class="form__button">opsturen</button>
        </form>
    </section>
    
</body>
</html>