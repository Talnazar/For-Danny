<?php
require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class repositorySubscriber
{
    public static function addSubscriber()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'INSERT INTO Subscribers(FirstName,LastName,BirthDate,RegistrationDate) 
			VALUES(:FirstName,:LastName,:BirthDate,:RegistrationDate)';


			$statement = $pdo->prepare($sql);

			$statement->execute([
				':FirstName' => $_POST['FirstName'],
				':LastName' => $_POST['LastName'],
				':BirthDate' => $_POST['BirthDate'],
				':RegistrationDate' => $_POST['RegistrationDate']
			]);
		}

	public static function updateSubscriber()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'UPDATE Subscribers
			SET  FirstName = :FirstName,LastName = :LastName,BirthDate = :BirthDate,RegistrationDate = :RegistrationDate
			WHERE SubscriberID = :SubscriberID';

			$statement = $pdo->prepare($sql);

			try{
				$statement->execute([			
					':FirstName' => $_POST['FirstName'],
					':LastName' => $_POST['LastName'],
					':BirthDate' => $_POST['BirthDate'],
					':RegistrationDate' => $_POST['RegistrationDate'],
					':SubscriberID' => $_POST['ID']
				]);	
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	
	public static function deleteSubscriber()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'DELETE FROM Subscribers
			WHERE SubscriberID = :SubscriberID';

			$statement = $pdo->prepare($sql);
			$statement->execute([			
				':SubscriberID' => $_POST['ID']
			]);
		}

	public static function GetAllSubscribers()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM subscribers';
			$statement = $pdo->query($sql);
			$subscribers = $statement->fetchAll(PDO::FETCH_ASSOC);

			if($subscribers){
				return $subscribers;
			}
		}

	public static function GetByIDSubscriber()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM subscribers
			WHERE SubscriberID = :SubscriberID';
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':SubscriberID', $_POST['ID'], PDO::PARAM_INT);
			$statement->execute();
			$subscriber = $statement->fetch(PDO::FETCH_ASSOC);

			if($subscriber){
				return $subscriber;
			}
		}
	public static function GetByIDSubscriberForSubscription($ID)
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM subscribers
			WHERE SubscriberID = :SubscriberID';
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':SubscriberID', $ID, PDO::PARAM_INT);
			$statement->execute();
			$subscriber = $statement->fetch(PDO::FETCH_ASSOC);

			if($subscriber){
				return $subscriber;
			}
		}
}