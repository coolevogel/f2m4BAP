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

    

    <?php foreach($result as $row):?>
        <section class="card-section">
        <article class="card">
            <div class="card-top">
                <img src="images/<?php echo $row['foto'];?>" alt="foto van project 2" height="100%" width="100%">
            </div>
            <div class="card-bottom">
                
                    <a class="a" href="detail.php?id=<?php echo $row['id'];?>">detail pagina</a>
                
            </div>
        </article>
        </section>
    <?php endforeach; ?>
    
</body>
</html>