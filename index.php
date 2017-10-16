
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
    
   
    <div id="screen" style="width:75%" >
    <h1>Find a movie</h1>
    <form action="workout.php" method="post">
        <div class="container">
                <div class="row">
                    
                     <div class="col-4">    
                    <p id="name">Search by name</p>
                    <br>
                    <div id="search_name" class="collapse">
                        <input type="text" name="name">
                    </div>
                </div>
                <div class="col-4">
                    <button id="year">Search by year</button>
                    <br>
                    <div>
                        <input type="text" name="year">
                    </div>
                </div>
                <div class="col-4">
                    <button id="genre">Sear by genre</button>
                    <br>
                    <div>
                        <input type="text" name="genre">
                    </div>
                </div>
            </div>
        </div>

            <input  class="btn btn-dark m-5 btn-lg" type="submit" value="Search">
            </form>
            

            <button id="#id">Button</button>
            <div id="text" class="collapse">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi dignissimos incidunt est commodi, dicta temporibus, minima accusamus distinctio dolore cum atque consequuntur quo laudantium alias repellendus at numquam eaque quisquam?</div>

    
   

  




    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>

    <script>
         $(document).ready(function(){


            $("#id").click(function(){
                $('#text').toggleClass('collapse');
            });
         });
    </script>

</body>
</html>