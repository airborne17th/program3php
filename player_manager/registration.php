<?php
$the_title = "SC | Registration";
$pathcor = "../";

require_once '../view/header.php';
if (!isset($error_message)) {
    $error_message = '';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
            </head>
    <body>
        <main>
        <h1>Registration</h1>
        <h2>Please fill out each box below to create your account.</h2>
        <p>Note that your playername. Must be within 4 to 30 characters in length. playername cannot have special characters (@$!%*?&). <br>
        Password guidelines: Password must have the following, an upper case letter, lower case letter, a digit and a special character. 
        Password must be at least 12 characters long.</p>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_player">
        <span class="error"><?php echo $error_message ?></span><br><br>
        <label>First Name: </label>
        <input type="text" name="first_name" placeholder="Enter your first name"><br>
        <label>Last Name: </label>
        <input type="text" name="last_name" placeholder="Enter your last name"><br> 
        <label>E-mail: </label>
        <input type="text" name="email" placeholder="Enter your e-mail"><br> 
        <label>Player Name: </label>
        <input type="text" name="newplayer" placeholder="Create player name"><br>
        <label>Password: </label>
        <input type="text" name="newpass" placeholder="Create password"><br> 
        <label>&nbsp;</label>
        <input type="submit" value="Submit"><br><br>
    </form>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
     </main>
    </body>
<?php require_once '../view/footer.php'; ?> 