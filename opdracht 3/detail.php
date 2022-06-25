<?php
require 'functions.php';
$connection = dbConnect();

 if(!isset($_GET['id']) ){
    echo "er is geen ID";
    exit;
 }

$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen getal (integer)";
    exit;
}

$statement = $connection->prepare('SELECT * FROM `project` WHERE id =?');
$params = [$id];
$statement->execute($params);
$place = $statement->fetch(PDO::FETCH_ASSOC);
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

    <section class="card-section">
        <article class="card">
            <div class="detail-card-top">
                <img src="images/<?php echo $place['foto'];?>" alt="foto van project" height="100%" width="100%">
            </div>
        </article>
    </section>
    <section class="card-bottom">
        
    </section>
    
</body>
</html>