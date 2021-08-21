<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class showerSubscriber{

    public static function ShowAllSubscribers(){
        $subscribers = repositorySubscriber::GetAllSubscribers();

        foreach ($subscribers as $subscriber) {
            echo "Subscriber ID: ".$subscriber['SubscriberID'] . '<br>';
            echo "First name: ".$subscriber['FirstName'] . '<br>';
            echo "Last name: ".$subscriber['LastName'] . '<br>';
            echo "Date of birth: ".$subscriber['BirthDate'] . '<br>';
            echo "Registration date: ".$subscriber['RegistrationDate'] . '<br>';
            echo "______________________________________" . '<br>';
            echo "</br>";
        }
    }

    public static function ShowByIDSubscriber(){
        $subscriber = repositorySubscriber::GetByIDSubscriber();

            echo "Subscriber ID: ".$subscriber['SubscriberID'] . '<br>';
            echo "First name: ".$subscriber['FirstName'] . '<br>';
            echo "Last name: ".$subscriber['LastName'] . '<br>';
            echo "Date of birth: ".$subscriber['BirthDate'] . '<br>';
            echo "Registration date: ".$subscriber['RegistrationDate'] . '<br>';
            echo "______________________________________" . '<br>';
        
    }

    public static function ShowDeletedSubscriber(){
        self::ShowByIDSubscriber();
        echo '<br>';

        repositorySubscriber::deleteSubscriber();
        echo "Subscriber deleted";
    }

    public static function ShowAddedSubscriber(){
        repositorySubscriber::addSubscriber();
            echo "Subscriber added successfully" . '<br><br>';
            echo "First name: ".$_POST['FirstName'] . '<br>';
            echo "Last name: ".$_POST['LastName'] . '<br>';
            echo "Date of birth: ".$_POST['BirthDate'] . '<br>';
            echo "Registration Date: ".$_POST['RegistrationDate'] . '<br>';
            echo "______________________________________" . '<br>';
    }

    public static function ShowUpdatedSubscriber(){
        repositorySubscriber::updateSubscriber();
            echo "Subscriber updated successfully" . '<br><br>';
            echo "Subscriber ID: ".$_POST['ID'] . '<br>';
            echo "First name: ".$_POST['FirstName'] . '<br>';
            echo "Last name: ".$_POST['LastName'] . '<br>';
            echo "Date of birth: ".$_POST['BirthDate'] . '<br>';
            echo "Registration Date: ".$_POST['RegistrationDate'] . '<br>';
            echo "______________________________________" . '<br>';
    }
    
}