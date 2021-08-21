<!DOCTYPE html>
    <head>
        <title>Delete Subscription</title>
    </head>
    <body>
        <h1>Delete Subscription</h1>
        <form method="POST">
            <label for="ID">Subscription ID:</label>
            <input type="number" id="ID" name="ID" min="1">
            <input type="submit" name="submit" value="Delete">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorSubscription::ValidateIfExistSubscription()){
                showerSubscription::ShowDeletedSubscription();
            }
        ?>

    </body>
</html>