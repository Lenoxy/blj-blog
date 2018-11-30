<?php 
    $user = 'root';
    $pass = '';
  
    $dbh = new PDO('mysql:host=localhost;dbname=blog', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare('SELECT * FROM posts');
    $stmt->execute();
    $posts = $stmt->fetchAll();
?>