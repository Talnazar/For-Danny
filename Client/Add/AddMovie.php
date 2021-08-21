<!DOCTYPE html>
    <head>
        <title>Add Movie</title>
    </head>
    <body>
        <h1>Add Movie</h1>
        <form action="" method="POST">
            <label for="movie">Movie name:</label>
            <input type="text" id="movie" name="MovieName"><br>

            <label for="director">Director:</label>
            <input type="text" id="director" name="DirectorName"><br>

            <label for="release">Release date:</label>
            <input type="date" id="release" name="ReleaseDate"><br>

            <label for="pg">PG:</label>
            <input type="number" id="pg" name="MinimalAge" min="0" max="130"><br>

            <br>
            <input type="submit" name="submit" value="Add">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorMovie::ValidateMovie()){
                showerMovie::ShowAddedMovie();
            }
        ?>
        
    </body>
</html>