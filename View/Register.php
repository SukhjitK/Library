<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Content/stylesheet.css">
        <title>Register</title>
    </head>
    <body>
    <div class="container">
        <form class="my-form" action="../Controller/Register_Con.php" method="POST">
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="firstname" required> 
            </div> 
            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="lastname" required> 
            </div>
            <div class="form-group">
                <label>Email Address:</label>
                <input type="email" name="email" required> 
            </div>
            <div class="form-group">
                <label>Password:</label> 
                <input type="password" name="password" required> 
            </div>
            <div class="form-group">
                <label>Confirm Password: </label>
                <input type="password" name="passwordtwo" required> 
            </div>
            <input class="button" type="submit" name="Register" value="Register"/>  
        </form>
    </div>
    </body>
</html>
