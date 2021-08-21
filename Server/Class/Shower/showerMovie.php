<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class showerMovie{

    public static function ShowAllMovies(){
        $movies = repositoryMovie::GetAllMovies();

        foreach ($movies as $movie) {
            echo "Movie ID: ".$movie['MovieID'] . '<br>';
            echo "Movie name: ".$movie['MovieName'] . '<br>';
            echo "Movie director: ".$movie['DirectorName'] . '<br>';
            echo "Release date: ".$movie['ReleaseDate'] . '<br>';
            echo "Minimal age: ".$movie['MinimalAge'] . '<br>';
            echo "______________________________________" . '<br>';
            echo "</br>";
        }
    }

    public static function ShowByIDMovie(){
        $movie = repositoryMovie::GetByIDMovie();

            echo "Movie ID: ".$movie['MovieID'] . '<br>';
            echo "Movie name: ".$movie['MovieName'] . '<br>';
            echo "Movie director: ".$movie['DirectorName'] . '<br>';
            echo "Release date: ".$movie['ReleaseDate'] . '<br>';
            echo "Minimal age: ".$movie['MinimalAge'] . '<br>';
            echo "______________________________________" . '<br>';
    }

    public static function ShowDeletedMovie(){
        self::ShowByIDMovie();
        echo '<br>';

        repositoryMovie::deleteMovie();
        echo "Movie deleted";
    }

    public static function ShowAddedMovie(){
        repositoryMovie::addMovie();
            echo "Movie added successfully" . '<br><br>';
            echo "Movie name: ".$_POST['MovieName'] . '<br>';
            echo "Movie director: ".$_POST['DirectorName'] . '<br>';
            echo "Release date: ".$_POST['ReleaseDate'] . '<br>';
            echo "Minimal age: ".$_POST['MinimalAge'] . '<br>';
            echo "______________________________________" . '<br>';
    }

    public static function ShowUpdatedMovie(){
        repositoryMovie::updateMovie();
            echo "Movie updated successfully" . '<br><br>';
            echo "Movie ID: ".$_POST['ID'] . '<br>';
            echo "Movie name: ".$_POST['MovieName'] . '<br>';
            echo "Movie director: ".$_POST['DirectorName'] . '<br>';
            echo "Release date: ".$_POST['ReleaseDate'] . '<br>';
            echo "Minimal age: ".$_POST['MinimalAge'] . '<br>';
            echo "______________________________________" . '<br>';
    }
    
}