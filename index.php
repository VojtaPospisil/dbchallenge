<?php 

require_once 'db.php';

//$name = $_POST['name'];
if ($_POST) {
    
            $db = db_connect();
            $search = $db->real_escape_string($_POST['name']);
            $stmt = $db->prepare("SELECT * FROM imdb_movie WHERE name = '%$search%' ");            
            $stmt->execute([$_POST['name']]);
            $result = $stmt->fetch();
            //echo $result ['name'];
            //echo $result ['year'];
            //echo $result []
            //echo $result['name','year','rating'];
            header('Location: workout.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>imdb</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
   
    <div id="screen" class="container text-center" ; style="width:50%" >
    <h1>Find a movie</h1>
        <div class="row m-3">
            <div class="col-12" >
            <br>
            <form action="moviedetail.php" method="post">
                <p>Search by name:</p>
           
            <br>
            <input type="text" name="name" value="Search">
          <!--  </div>
            <div class="col-4">
            <br>
            <form action="moviedetail.php" method="post">
            <label for="genre">Search by genre:</label>
            <br>
            <input type="text" name="genre" value="">
            </form>
            </div>
            <div class="col-4">
            <br>
            <form action="moviedetail.php" method="post">
            <label for="year">Search by year:</label>
            <br>
            <select name="year" id="">
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
            </select>
            </form>
            </div>
            <div class="col-12 m-5">
            -->
            <input  class="btn btn-dark m-5 btn-lg" type="submit" value="Search">
            </form>
            </div>

        </div>
   

 


        <!-- 
        <form action="moviedetail.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" value="">
            <br>
            <label for="genre">Genre</label>
            <input type="text" name="genre" value="">
            <br>
            <label for="year">Year</label>
            <select name="year" id="">
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
            </select>
            <br>
            <input type="submit" value="Search">
        </form> -->
    </div>
  






</body>
</html>