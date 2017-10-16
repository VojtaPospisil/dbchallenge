<?php
require_once 'db.php';

if (!empty($_POST['name'])) {

            $db = db_connect();
            $stmt = $db->prepare("SELECT * FROM imdb_movie WHERE name LIKE ? ");
            $stmt->execute([$_POST['name'].'%']);
            $infos = $stmt->fetchAll();               
}

if (!empty($_POST['year'])) {
    
                $db = db_connect();
                $stmt = $db->prepare("SELECT * FROM imdb_movie WHERE year = ? ");
                $stmt->execute([$_POST['year']]);
                $years = $stmt->fetchAll();                       
}

if (!empty($_POST['genre'])) {
        
                $db = db_connect();
                $stmt = $db->prepare('SELECT * FROM imdb_genre WHERE name = ?');
                $stmt->execute([$_POST['genre']]);
                $genre = $stmt->fetch();
                //var_dump($genre['id']);
             
                $db = db_connect();
                $stmt = $db->prepare('SELECT * FROM `imdb_movie_has_genre` JOIN `imdb_movie` ON `imdb_movie_has_genre`.`imdb_movie_id` = `imdb_movie` . `imdb_id` WHERE `imdb_movie_has_genre`. `imdb_genre_id` = ? ');
                $stmt->execute([$genre['id']]);
                $genres = $stmt->fetchAll();
                //var_dump($genres);
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div id="screen" class="container text-center"  style="width:75%">

    <?php
        if (isset($infos)) {
            foreach ($infos as $info) {
                echo '<p> <a href=moviedetail.php?id='.$info ['imdb_id'].'">' .$info ['name']. '</a></p>';
        }
    };
?>
    <?php 
        if (isset($years)) {
             foreach ($years as $year) {
                echo '<p> <a href="moviedetail.php?id='.$year ['imdb_id'].'"> ' .$year ['year']. '... ' .$year ['name']. '</a></p>';
        }
    };
?>
 <?php 
        if (isset($genres)) {
             foreach ($genres as $genre) {
                echo '<p> <a href="moviedetail.php?id='.$genre ['imdb_id']. '">' .$genre['name']. '</p>';
        }
    };
?>


    </div> 
</body>
</html>