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

if (isset($_POST["speichern"])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $post = $_POST['post'];
    ?> <div class=errordiv> <?php

    if(empty($name)){
        ?> <p class=errorbox>Bitte geben Sie Ihr Name an.</p> <?php
        $isNameValid = true;
    }

    if(empty($title)){
        ?> <p class=errorbox>Bitte schreiben Sie ein Titel.</p> <?php
        $isTitleValid = true;
    }

    if(empty($post)){
       ?> <p class=errorbox>Bitte schreiben Sie eine Nachticht.</p> <?php
       $isPostValid = true;
    }
?> </div> <?php
}






  ?>





     <h1>Blog</h1><br>
     <form action="index.php" method="post">
        <label for="name"> Name:</label><input id="name" type="text" name="name"><br>
        <label for="title"> Title:</label><input id="title" type="text" name="title"><br>
        <label for="post"> Text:</label><input id="post" type="text" name="post"><br>
        <input type="submit" id="submit" name="speichern"><br>
    </form>
    <?PHP
    DBconnect();
    DBwrite();
    ?>
 
 </body>
 
 </html>







 <?php

 function DBconnect(){


    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);   
 }

 function DBwrite(){
     
 }