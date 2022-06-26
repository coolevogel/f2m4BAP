<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `project`')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bap opdracht 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <a href="contact.php">contact page</a>
    
</body>
</html>