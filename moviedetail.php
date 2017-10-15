<?php

require_once 'db.php';

if ($_POST) {
    
            $db = db_connect();
            $stmt = $db->prepare("SELECT * FROM imdb_movie WHERE name = ? ");
            $stmt->execute([$_POST['name']]);
            $info = $stmt->fetch();
            echo $info ['name'];
            echo $info ['year'];
            $info['imdb_id'];
 }
 //genre
           /* $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_movie_has_genre WHERE imdb_movie_id = ?');
            $stmt->execute([$info['imdb_id']]);
            $result = $stmt->fetch();
            $result['imdb_genre_id'];

            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_genre WHERE id = ?');
            $stmt->execute([$result['imdb_genre_id']]);
            $genre = $stmt->fetch();
            echo ($genre['name']);
            */
            
            
          
            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_movie_has_genre LEFT JOIN imdb_genre ON `imdb_movie_has_genre` . `imdb_genre_id` = `imdb_genre` . `id` WHERE imdb_movie_id = ?' );
            $stmt->execute([$info['imdb_id']]);
            $genre = $stmt->fetch();
            echo ($genre['name']);
            

// actors and name

            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_movie_has_person WHERE imdb_movie_id = ?');
            $stmt->execute([$info['imdb_id']]);
            $name = $stmt->fetch();
            $name['imdb_person_id'];
            echo $name['description'];

            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_person WHERE imdb_id = ?');
            $stmt->execute([$name['imdb_person_id']]);
            $fullname = $stmt->fetch();
            echo $fullname['fullname'];

        //country
            
            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_movie_has_origin_country LEFT JOIN imdb_movie_origin_country ON `imdb_movie_has_origin_country` . `imdb_movie_id` = `imdb_movie_origin_country` . `id` WHERE imdb_movie_id = ?');
            $stmt->execute([$info['imdb_id']]);
            $country = $stmt->fetch();
            echo $country['name'];
            

     /*     $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_movie_has_origin_country WHERE imdb_movie_id = ?');
            $stmt->execute([$info['imdb_id']]);
            $countryid = $stmt->fetch();
            $countryid['imdb_movie_origin_country_id'];

            $db = db_connect();
            $stmt = $db->prepare('SELECT * FROM imdb_movie_origin_country WHERE id = ?');
            $stmt->execute([$countryid['imdb_movie_origin_country_id']]);
            $country = $stmt->fetch();
            echo $country['name'];
           */

// language

            $db = db_connect();   
            $stmt = $db->prepare('SELECT * FROM imdb_movie_has_language LEFT JOIN imdb_language ON imdb_movie_has_language . imdb_language_id = imdb_language . id WHERE imdb_movie_id = ?');
            $stmt->execute([$info['imdb_id']]);
            $language = $stmt->fetch();
            echo ($language['name']);      


            //echo $result []
            //echo $result['name','year','rating'];
            //header('Location: workout.php');
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="movies">
        <?php if(isset ($info ['name'])) { echo '<p> Movie name: ' .$info ['name'];}; ?>
        <?php if(isset ($info ['year'])) { echo '<p> Movie year: ' .$info ['year'];}; ?>
        <?php if(isset ($genre['name'])) { echo '<p> Movie genre: ' .$genre['name'];}; ?>
        <?php if(isset ($fullname['fullname'])) { echo '<p> Movie actor: ' .$fullname['fullname']. ' as ' .$name['description'] ;}; ?>
        <?php if(isset ($country['name'])) { echo '<p> Movie Country: ' .$country['name'];}; ?>
        <?php if(isset ($language['name'])) { echo '<p> Movie language: ' .$language['name'];}; ?>
</div>
<a href="index.php">Another search</a>

</body>
</html>
