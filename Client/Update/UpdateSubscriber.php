<!DOCTYPE html>
    <head>
        <title>Update Subscriber</title>
    </head>
    <body>
        <h1>Update Subscriber</h1>

        <form method="POST">
            <label for="ID">Subscriber ID:</label>
            <input type="number" id="ID" name="ID" min="1">
            <br><br>
            
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="FirstName"><br>

            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="LastName"><br>

            <label for="birthday">Date of birth:</label>
            <input type="date" id="birthday" name="BirthDate"><br>

            <br>
            <label for="registration">Registration date:</label>
            <input type="date" id="registration" name="RegistrationDate"><br>

            <br>
            <input type="submit" name="submit" value="Update">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorSubscriber::ValidateUpdateSubscriber()){
                showerSubscriber::ShowUpdatedSubscriber();
            }
        ?>

    </body>
</html>