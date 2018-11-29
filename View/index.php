<!DOCTYPE html>
 <html lang="de">
 <head>
   
 <title>Leo's Blog</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="../style.css">
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 </head>
 <body>

 <a class="nav" href="../">Home</a>
 <a class="nav" href="">Beiträge anzeigen</a>
 <a class="nav" href="../write/">Beiträge schreiben</a>
 <a class="nav" href="../blogs/">Andere Blogs</a>

 <h1>Beiträge anzeigen</h1>

<?php

$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $dbh->prepare('SELECT * FROM posts');
    $stmt->execute();
    
    foreach($stmt as $output){?>
        <div class="form-actions">
            <h2><?= htmlspecialchars($output['created_by'], ENT_QUOTES, "UTF-8"); ?></h2>
            <h4><?= htmlspecialchars($output['post_title'], ENT_QUOTES, "UTF-8"); ?></h4>
            <p><?= htmlspecialchars($output['post_text'], ENT_QUOTES, "UTF-8"); ?></p>    
            <p><?= htmlspecialchars($output['created_at'], ENT_QUOTES, "UTF-8"); ?></p>
            <?php if( htmlspecialchars($output['image'], ENT_QUOTES, "UTF-8") !== ''){
            ?><img class="image" src="<?= htmlspecialchars($output['image'], ENT_QUOTES, "UTF-8"); ?>" alt="Bild nicht verfügbar." />
        <?php } ?>
        <hr>
        </div>
        <?php
    }





foreach($stmt->fetchAll() as $x) {
    var_dump($x);
}

?>



 </body>
 
 </html>