<!DOCTYPE html>
    <head>
        <title>Update Subscription</title>
    </head>
    <body>
        <h1>Update Subscription</h1>

        <form method="POST">
            <label for="ID">Subscription ID:</label>
            <input type="number" name="ID" min="1">
            <br><br>

            <label for="subscriber">Subscriber ID:</label>
            <input type="number" name="SubscriberID" min="1"><br>

            <label for="movie">Movie ID:</label>
            <input type="number" name="MovieID" min="1"><br>

            <label for="watch">Watch date:</label>
            <input type="date" name="WatchDate"><br>

            <br>
            <input type="submit" name="submit" value="Update">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorSubscription::ValidateUpdateSubscription()){
                showerSubscription::ShowUpdatedSubscription();
            }
        ?>

    </body>
</html>