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