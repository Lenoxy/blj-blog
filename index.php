<!DOCTYPE html>
 <html lang="de">
 <head>
   
 <title>Blog</title>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="style.css">
 <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 </head>
 <body>

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
        
    }



    if($isNameValid===true && $isTitleValid===true && $isPostValid===true){
        $stmt = $dbh->prepare("INSERT INTO posts (created_by, post_title, post_text) VALUES(:name, :title, :post)");
        $stmt->execute([':name' => $name, ':title' => $title, ':post' => $post]);
    }
}
?>





     <h1>Blog</h1><br>
     <form action="index.php" method="post">
        <label for="name"> Name:</label><input id="name" type="text" name="name"><br>
        <label for="title"> Title:</label><input id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><textarea id="post"  name="post" rows="10"></textarea><br>
        <input type="submit" id="submit" name="speichern"><br>
    </form>
 
 </body>
 
 </html>