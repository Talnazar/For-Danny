<!DOCTYPE html>
    <head>
        <title>Add Subscriber</title>
    </head>
    <body>
        <h1>Add Subscriber</h1>
        <form method="POST">
            <label for="fname">First name:</label>
            <input type="text" name="FirstName"><br>

            <label for="lname">Last name:</label>
            <input type="text" name="LastName"><br>

            <label for="birthday">Date of birth:</label>
            <input type="date" name="BirthDate"><br>

            <br>
            <label for="registration">Registration date:</label>
            <input type="date" name="RegistrationDate"><br>

            <br>
            <input type="submit" name="submit" value="Add">
        </form>
        <input type="button" value="Back" onclick="location.href='http://localhost/Danny%20Project/Client/Main.html'">
        <br><br>

        <?php
            require_once dirname(dirname(__DIR__)).'/Server/AutoLoader.php';
            if(isset($_POST['submit']) && validatorSubscriber::ValidateSubscriber()){
                showerSubscriber::ShowAddedSubscriber();
            }
        ?>
    </body>
</html>