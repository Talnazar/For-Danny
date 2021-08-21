<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class repositorySubscription
{
    public static function addSubscription()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'INSERT INTO subscriptions(SubscriberID,MovieID,WatchDate) 
			VALUES(:SubscriberID,:MovieID,:WatchDate)';
			
			$statement = $pdo->prepare($sql);
			$statement->execute([
				':SubscriberID' => $_POST['SubscriberID'],
				':MovieID' => $_POST['MovieID'],
				':WatchDate' => $_POST['WatchDate'],
			]);
		}

	public static function updateSubscription()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'UPDATE subscriptions
			SET  SubscriberID = :SubscriberID,MovieID = :MovieID,WatchDate = :WatchDate
			WHERE SubscriptionID = :SubscriptionID';

			$statement = $pdo->prepare($sql);
			
			try{
				$statement->execute([			
					':SubscriberID' => $_POST['SubscriberID'],
					':MovieID' => $_POST['MovieID'],
					':WatchDate' => $_POST['WatchDate'],
					':SubscriptionID' => $_POST['ID']
				]);	
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	
	public static function deleteSubscription()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'DELETE FROM subscriptions
			WHERE SubscriptionID = :SubscriptionID';

			$statement = $pdo->prepare($sql);
			$statement->execute([			
				':SubscriptionID' => $_POST['ID']
			]);
		}

	public static function GetAllSubscriptions()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM subscriptions';
			$statement = $pdo->query($sql);
			$subscriptions = $statement->fetchAll(PDO::FETCH_ASSOC);

			if($subscriptions){
				return $subscriptions;
			}
		}
		
	public static function GetByIDSubscription()
		{
			$pdo = new connectDB();
			$pdo = $pdo->connectSubscriptionDB();
			$sql = 'SELECT * FROM subscriptions
			WHERE SubscriptionID = :SubscriptionID';
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':SubscriptionID', $_POST['ID'], PDO::PARAM_INT);
			$statement->execute();
			$subscription = $statement->fetch(PDO::FETCH_ASSOC);

			if($subscription){
				return $subscription;
			}
		}
	
	public static function FillterBySubscriberSubscriptions($filter){
		$pdo = new connectDB();
		$pdo = $pdo->connectSubscriptionDB();
		$sql = 'SELECT * FROM subscriptions
		WHERE SubscriberID = :ID';
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':ID', $filter, PDO::PARAM_INT);
		$statement->execute();
		$subscriptions = $statement->fetchAll(PDO::FETCH_ASSOC);

		if($subscriptions){ 
			return $subscriptions;
		}
	}

	public static function FillterByMovieSubscriptions($filter){
		$pdo = new connectDB();
		$pdo = $pdo->connectSubscriptionDB();
		$sql = 'SELECT * FROM subscriptions
		WHERE MovieID = :ID';
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':ID', $filter, PDO::PARAM_INT);
		$statement->execute();
		$subscriptions = $statement->fetchAll(PDO::FETCH_ASSOC);

		if($subscriptions){ 
			return $subscriptions;
		}
	}
	
}