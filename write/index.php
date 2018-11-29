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
<a class="nav" href="/blog/view/">Beiträge anzeigen</a>
<a class="nav" href="/blog/write">Beiträge schreiben</a>
<a class="nav" href="../blogs">Andere Blogs</a>

<?php

$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$isNameValid = true;
$isTitleValid = true;
$isPostValid = true;

    
if (isset($_POST["speichern"])) {
    $name = $_POST['name'] ??'';
    $title = $_POST['title']??'';
    $post = $_POST['post']??'';
    $image = $_POST['image']??'';

    if(empty($name)){
        ?> <p class=errorbox>Bitte geben Sie Ihr Name an.</p> <?php
        $isNameValid = false;
    }

    if(empty($title)){
        ?> <p class=errorbox>Bitte schreiben Sie ein Titel.</p> <?php
        $isTitleValid = false;
    }

    if(empty($post)){
       ?> <p class=errorbox>Bitte schreiben Sie eine Nachticht.</p> <?php
       $isPostValid = false;
    }
    
    if($isNameValid===true && $isTitleValid===true && $isPostValid===true){
        $stmt = $dbh->prepare("INSERT INTO posts (created_by, post_title, post_text, image) VALUES(:name, :title, :post, :image)");
        $stmt->execute([':name' => $name, ':title' => $title, ':post' => $post, ':image' => $image]);
    }
}
?>
     <h1>Beiträge schreiben</h1><br>
     <form action="index.php" method="post">
        <label for="name">* Name:</label><input id="name" type="text" name="name"><br>
        <label for="title">* Titel:</label><input id="title" type="text" name="title"><br>
        <label for="post">* Text:</label><textarea id="post"  name="post" rows="20"></textarea><br>
        <label for="image">Bild:</label><input id="image" name="image" type="url"><br>
        <input type="submit" id="submit" name="speichern"><br>
        <p>Die mit * gekennzeichneten Formulare müssen ausgegüllt werden.</p>
    </form>
 </body>
 
 </html>