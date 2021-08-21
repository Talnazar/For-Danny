<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class showerSubscription{

    public static function ShowAllSubscriptions(){
        $subscriptions = repositorySubscription::GetAllSubscriptions();

        foreach ($subscriptions as $subscription) {
            echo "Subscription ID: ".$subscription['SubscriptionID'] . '<br>';
            echo "Subscriber ID: ".$subscription['SubscriberID'] . '<br>';
            echo "Movie ID: ".$subscription['MovieID'] . '<br>';
            echo "Watch date: ".$subscription['WatchDate'] . '<br>';
            echo "______________________________________" . '<br>';
            echo "</br>";
        }
    }

    public static function ShowByIDSubscription(){
        $subscription = repositorySubscription::GetByIDSubscription();

            echo "Subscription ID: ".$subscription['SubscriptionID'] . '<br>';
            echo "Subscriber ID: ".$subscription['SubscriberID'] . '<br>';
            echo "Movie ID: ".$subscription['MovieID'] . '<br>';
            echo "Watch date: ".$subscription['WatchDate'] . '<br>';
            echo "______________________________________" . '<br>';

    }

    public static function ShowDeletedSubscription(){
        self::ShowByIDSubscription();
        echo '<br>';

        repositorySubscription::deleteSubscription();
        echo "Subscription deleted";
    }

    public static function ShowAddedSubscription(){
        repositorySubscription::addSubscription();
            echo "Subscription added successfully" . '<br><br>';
            echo "Movie ID: ".$_POST['MovieID'] . '<br>';
            echo "Subscriber ID: ".$_POST['SubscriberID'] . '<br>';
            echo "Watch Date: ".$_POST['WatchDate'] . '<br>';
            echo "______________________________________" . '<br>';
    }

    public static function ShowUpdatedSubscription(){
        repositorySubscription::updateSubscription();
            echo "Subscription updated successfully" . '<br><br>';
            echo "Subscription ID: ".$_POST['ID'] . '<br>';
            echo "Movie ID: ".$_POST['MovieID'] . '<br>';
            echo "Subscriber ID: ".$_POST['SubscriberID'] . '<br>';
            echo "Watch Date: ".$_POST['WatchDate'] . '<br>';
            echo "______________________________________" . '<br>';
    }
    
}