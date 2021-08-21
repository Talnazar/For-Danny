<!DOCTYPE html>
    <head>
        <title>Add Subscription</title>
    </head>
    <body>
        <h1>Add Subscription</h1>
        <form method="POST">
            <label for="subscriber">Subscriber ID:</label>
            <input type="number" id="subscriber" name="SubscriberID" min="1"><br>

            <label for="movie">Movie ID:</label>
            <input type="number" id="movie" name="MovieID" min="1"><br>

            <label for="watch">Watch date:</label>
            <input type="date" id="watch" name="WatchDate"><br>

            <br>
            <input type="submit" name="submit" value="Add">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorSubscription::ValidateSubscription()){
                showerSubscription::ShowAddedSubscription();
            }
        ?>

    </body>
</html>