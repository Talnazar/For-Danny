<!DOCTYPE html>
    <head>
        <title>Get All Subscriptions</title>
    </head>
    <body>

        <h1>Get All Subscriptions</h1>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';  
            ShowerSubscription::ShowAllSubscriptions();
        ?>

        
        
    </body>
</html>