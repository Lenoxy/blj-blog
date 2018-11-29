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
 <a class="nav" href="">Andere Blogs</a>
 
 <h1>Andere Blogs</h1>

<div class="wrapper">
<?php
$user = 'guest';
$pass = 'blj12345';
$dbh = new PDO('mysql:host=10.20.16.102;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM andereblogs');
$stmt->execute();

foreach($stmt as $output){?>
<div class="form-actions">
    <a href="http://<?= htmlspecialchars($output['ip'], ENT_QUOTES, "UTF-8");
    ?><?= htmlspecialchars($output['pfad'], ENT_QUOTES, "UTF-8");
    ?>"><?= htmlspecialchars($output['name'], ENT_QUOTES, "UTF-8");
    ?></a>

</div>
<?php
}
?>
</div>
</body>
</html>