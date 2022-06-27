<?php
require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';
$datum = date('Y-m-d h:i:s');

$errors = [];


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];

    if(isEmpty($voornaam)){
        $errors['voornaam'] = 'vul uw voornaam in a.u.b';
    }
    if(isEmpty($achternaam)){
        $errors['achternaam'] = 'vul uw achternaam in a.u.b';
    }
    if(!isValidEmail($email)){
        $errors['email'] = 'dit is geen geldig email adres!';
    }
    if(!hasMinLength($bericht, 5)){
        $errors['bericht'] = 'vul minimaal 5 tekens in';
    }

    if(count($errors) == 0){

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

        header('location: bedankt.html');
        exit;
}

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

        <form action="contact.php" method="POST" novalidate>
            <div class="form__field">
                <label for="voornaam">voornaam</label>
                <input type="text" value="<?php echo $voornaam;?>" id="voornaam" name="voornaam" placeholder="voornaam" required>
                
                <?php if(!empty($errors['voornaam'])):?>
                    <p class="form__error"><?php echo $errors['voornaam']?></p>
                <?php endif;?>

            </div>
            <div class="form__field">
                <label for="achternaam">achternaam</label>
                <input type="text" value="<?php echo $achternaam;?>" id="achternaam" name="achternaam" placeholder="achternaam" required>
            
                <?php if(!empty($errors['achternaam'])):?>
                    <p class="form__error"><?php echo $errors['achternaam']?></p>
                <?php endif;?>
            
            </div>
            <div class="form__field">
                <label for="email">email</label>
                <input type="email" value="<?php echo $email;?>" id="email" name="email" placeholder="email" required>
            
                <?php if(!empty($errors['email'])):?>
                    <p class="form__error"><?php echo $errors['email']?></p>
                <?php endif;?>
            
            </div>
            <div class="form__field">
                <label for="bericht">bericht</label>
                <textarea id="bericht" name="bericht" placeholder="bericht" required><?php echo $bericht;?></textarea>
            
                <?php if(!empty($errors['bericht'])):?>
                    <p class="form__error"><?php echo $errors['bericht']?></p>
                <?php endif;?>
            
            </div>
            <button type="submit" class="form__button">opsturen</button>
        </form>
    </section>
    
</body>
</html>