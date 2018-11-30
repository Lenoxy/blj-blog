<?php
$user = 'guest';
$pass = 'blj12345';
$dbh = new PDO('mysql:host=10.20.16.102;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM andereblogs');
$stmt->execute();
$blogs = $stmt->fetchAll();