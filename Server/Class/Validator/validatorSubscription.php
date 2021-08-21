<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';


class validatorSubscription{

    public static function ValidateSubscription(){

        $subscriber = repositorySubscriber::GetByIDSubscriberForSubscription($_POST['SubscriberID']);
        $movie = repositoryMovie::GetByIDMovieForSubscription($_POST['MovieID']);

        $error = true;

        if(empty($_POST['SubscriberID'])){
            echo 'Please enter subscriber ID.' . '<br>';
            $error = false;
        }elseif(empty($subscriber)){
            echo 'This subscriber ID (' . $_POST['SubscriberID'] . ') doesn`t exist' . '<br>';
            $error = false;
        }
        if(empty($_POST['MovieID'])){
            echo 'Please enter movie ID.' . '<br>';
            $error = false;
        }elseif(empty($movie)){
            echo 'This movie ID (' . $_POST['MovieID'] . ') doesn`t exist' . '<br>';
            $error = false;
        }
        if(empty($_POST['WatchDate'])){
            echo 'Please enter watch date.' . '<br>';
            $error = false;
        }
        if(!empty($_POST['SubscriberID']) && !empty($subscriber) && ($subscriber['RegistrationDate'] > $_POST['WatchDate'])){
            echo 'The registration date (' . $subscriber['RegistrationDate'] . ') can`t be earlier then the watch date ('. $_POST['WatchDate'] . ')<br>';
            $error = false;
        }if(!empty($_POST['MovieID']) && !empty($movie) && ($movie['ReleaseDate'] > $_POST['WatchDate'])){
            echo 'The release date (' . $movie['ReleaseDate'] . ') can`t be earlier then the watch date ('. $_POST['WatchDate'] . ')<br>';
            $error = false;
        }
        return $error;
    }

    public static function ValidateUpdateSubscription(){

        $error = self::ValidateIfExistSubscription();

        $error = self::ValidateSubscription();

        return $error;
    }

    public static function ValidateIfExistSubscription(){

        $error = true;
        $subscription = repositorySubscription::GetByIDSubscription();

        if(empty($_POST['ID'])){
            echo 'Please enter subscription ID.' . '<br>';
            $error = false;
        }elseif(empty($subscription)){
            echo 'This ID (' . $_POST['ID'] . ') doesn`t exist' . '<br>';
            $error = false;
        }
        return $error;
    }
}