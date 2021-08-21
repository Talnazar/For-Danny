<!DOCTYPE html>
    <head>
        <title>Get By ID Subscriber</title>
    </head>
    <body>
        <h1>Get By ID: Subscriber</h1>
        <form action="" method="POST">
            <label for="ID">Subscriber ID:</label>
            <input type="number" id="ID" name="ID" min="1">
            <input type="submit" name="submit" value="Find">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorSubscriber::ValidateIfExistSubscriber()){
                showerSubscriber::ShowByIDSubscriber();
            }     
        ?> 
    </body>
</html>