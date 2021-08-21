<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class validatorSubscriber{

    public static function ValidateSubscriber(){

        $error = true;

        if(empty($_POST['FirstName'])){
            echo 'Please enter first name.' . '<br>';
            $error = false;
        }
        if(empty($_POST['LastName'])){
            echo 'Please enter last name.' . '<br>';
            $error = false;
        }
        if(empty($_POST['BirthDate'])){
            echo 'Please enter birth date.' . '<br>';
            $error = false;
        }elseif($_POST['BirthDate'] > date("Y-m-d")){
            echo 'The birth date (' . $_POST['BirthDate'] . ') can`t be in the future' . '<br>';
            $error = false;
        }
        if(empty($_POST['RegistrationDate'])){
            echo 'Please enter registtration date.' . '<br>';
            $error = false;
        }elseif($_POST['RegistrationDate'] > date("Y-m-d")){
            echo 'The registration date (' . $_POST['RegistrationDate'] . ') can`t be in the future' . '<br>';
            $error = false;
        }
        if($_POST['BirthDate'] > $_POST['RegistrationDate']){
            echo 'The registration date (' . $_POST['RegistrationDate'] . ') can`t be earlier then the birth date ('. $_POST['BirthDate'] . ')<br>';
            $error = false;
        }

        return $error;
    }

    public static function ValidateUpdateSubscriber(){

        $error = self::ValidateIfExistSubscriber();

        $error = self::ValidateSubscriber();

        return $error;
    }

    public static function ValidateIfExistSubscriber(){

        $error = true;
        $subscriber = repositorySubscriber::GetByIDSubscriber();

        if(empty($_POST['ID'])){
            echo 'Please enter subscriber ID.' . '<br>';
            $error = false;
        }elseif(empty($subscriber)){
            echo 'This ID (' . $_POST['ID'] . ') doesn`t exist' . '<br>';
            $error = false;
        }
        return $error;
    }

    public static function ValidateDeleteSubscriber(){

        $error = self::ValidateIfExistSubscriber();
        $SubscriberID = $_POST['ID'];
        $subscriprions = repositorySubscription::FillterBySubscriberSubscriptions($SubscriberID);

        if(!empty($subscriprions)){
            $error = false;
            foreach($subscriprions as $subscriprion){
                echo 'Before deleting the movie (' . $SubscriberID . ') you need to delete the subscription (' . $subscriprion['SubscriptionID'] . ')' . '<br>';
            }
        }
        return $error;
    }
}