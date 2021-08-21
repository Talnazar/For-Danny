<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class repositoryMovie
{
    public static function addMovie()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'INSERT INTO Movies(MovieName,DirectorName,ReleaseDate,MinimalAge) 
			VALUES(:MovieName,:DirectorName,:ReleaseDate,:MinimalAge)';

			$statement = $pdo->prepare($sql);
			$statement->execute([
				':MovieName' => $_POST['MovieName'],
				':DirectorName' => $_POST['DirectorName'],
				':ReleaseDate' => $_POST['ReleaseDate'],
				':MinimalAge' => $_POST['MinimalAge']
			]);
		}

	public static function updateMovie()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'UPDATE Movies
			SET  MovieName = :MovieName,DirectorName = :DirectorName,ReleaseDate = :ReleaseDate,MinimalAge = :MinimalAge
			WHERE MovieID = :MovieID';

			$statement = $pdo->prepare($sql);

			$statement->bindParam(':MovieID',$_POST['ID'], PDO::PARAM_INT);
			$statement->bindParam(':MovieName',$_POST['MovieName']);
			$statement->bindParam(':DirectorName',$_POST['DirectorName']);
			$statement->bindParam(':ReleaseDate',$_POST['ReleaseDate']);
			$statement->bindParam(':MinimalAge',$_POST['MinimalAge']);

			try{
				$statement->execute();	
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	
	public static function deleteMovie()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'DELETE FROM Movies
			WHERE MovieID = :MovieID';

			$statement = $pdo->prepare($sql);
			$statement->execute([			
				':MovieID' => $_POST['ID']
			]);
		}

	public static function GetAllMovies()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM movies';
			$statement = $pdo->query($sql);
			$movies = $statement->fetchAll(PDO::FETCH_ASSOC);

			if($movies){
				return $movies;
			}
		}
		
	public static function GetByIDMovie()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM movies
			WHERE MovieID = :MovieID';
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':MovieID', $_POST['ID'], PDO::PARAM_INT);
			$statement->execute();
			$movie = $statement->fetch(PDO::FETCH_ASSOC);

			if($movie){
				return $movie;
			}
		}
	public static function GetByIDMovieForSubscription($ID)
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM movies
			WHERE MovieID = :MovieID';
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':MovieID', $ID, PDO::PARAM_INT);
			$statement->execute();
			$movie = $statement->fetch(PDO::FETCH_ASSOC);

			if($movie){
				return $movie;
			}
		}
}