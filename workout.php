<?php
require_once 'db.php';

if ($_POST['name']) {

            $db = db_connect();
            $stmt = $db->prepare("SELECT * FROM imdb_movie WHERE name LIKE ? ");
            $stmt->execute([$_POST['name'].'%']);
            $infos = $stmt->fetchAll();               
}

if ($_POST['year']) {
    
                $db = db_connect();
                $stmt = $db->prepare("SELECT * FROM imdb_movie WHERE year = ? ");
                $stmt->execute([$_POST['year']]);
                $years = $stmt->fetchAll();                       
}

    if ($_POST['genre']) {
        
                $db = db_connect();
                $stmt = $db->prepare('SELECT * FROM imdb_genre WHERE name = ?');
                $stmt->execute([$_POST['genre']]);
                $genre = $stmt->fetchAll();
                var_dump ($genre['id']); 
                 
                $stmt = $db->prepare('SELECT * FROM `imdb_movie_has_genre` JOIN `imdb_movie` ON `imdb_movie_has_genre`.`imdb_movie_id` = `imdb_movie` . `imdb_id` WHERE `imdb_movie_has_genre`. `imdb_genre_id` = ? ');
                $stmt->execute([$idgenre]);
                $genres = $stmt->fetchAll();
                var_dump($genres);
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
    <?php foreach ($infos as $info) : ?>
        <p> <a href="moviedetail.php?id=<?php echo $info ['imdb_id']?>"><?php echo $info ['name'];?></a></p>
    <?php endforeach ; ?>
    <?php foreach ($years as $year) : ?>
        <p> <a href="moviedetail.php?id=<?php echo $year ['imdb_id']?>"><?php echo $year ['year'] ?> <?php echo $year ['name'];?></a></p>
    <?php endforeach ; ?>
</div> 

</body>
</html>