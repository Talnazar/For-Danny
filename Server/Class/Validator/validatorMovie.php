<?php

require_once dirname(dirname(__DIR__)).'/AutoLoader.php';

class validatorMovie{

    public static function ValidateMovie(){

        $error = true;

        if(empty($_POST['MovieName'])){
            echo 'Please enter movie name.' . '<br>';
            $error = false;
        }
        if(empty($_POST['DirectorName'])){
            echo 'Please enter director name.' . '<br>';
            $error = false;
        }
        if(empty($_POST['ReleaseDate'])){
            echo 'Please enter release date.' . '<br>';
            $error = false;
        }elseif($_POST['ReleaseDate'] > date("Y-m-d")){
            echo 'The release date (' . $_POST['ReleaseDate'] . ') can`t be in the future' . '<br>';
            $error = false;
        }
        if(empty($_POST['MinimalAge']) && ($_POST['MinimalAge']) != 0){
            echo 'Please enter PG.' . '<br>';
            $error = false;
        }

        return $error;
    }
    public static function ValidateUpdateMovie(){

        $error = self::ValidateIfExistMovie();

        $error = self::ValidateMovie();


        return $error;
    }
    public static function ValidateIfExistMovie(){

        $error = true;
        $movie = repositoryMovie::GetByIDMovie();

        if(empty($_POST['ID'])){
            echo 'Please enter movie ID.' . '<br>';
            $error = false;
        }elseif(empty($movie)){
            echo 'This ID (' . $_POST['ID'] . ') doesn`t exist' . '<br>';
            $error = false;
        }
        return $error;
    }

    public static function ValidateDeleteMovie(){

        $error = self::ValidateIfExistMovie();
        $MovieID = $_POST['ID'];
        $subscriprions = repositorySubscription::FillterByMovieSubscriptions($MovieID);

        if(!empty($subscriprions)){
            $error = false;
            foreach($subscriprions as $subscriprion){
                echo 'Before deleting the subscriber (' . $MovieID . ') you need to delete the subscription (' . $subscriprion['SubscriptionID'] . ')' . '<br>';
            }
        }
        return $error;
    }
}