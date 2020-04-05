<?php

$the_title = "SC | Login";
$pathcor = "../";

require_once '../view/header.php'; ?>


    </div>
    <body class="loginbody">
        <div class="login-box">	
            <form class="box" action="." method="post">
            <input type="hidden" name="action" value="login">
            <h2>Login</h2>
        <p>This website is used to connect people on campus to have fun and enjoy activities at SCC.<br> Please use the boxes below to sign into your account.</p> 
                <span class="error"><?php echo $loginerror_message ?></span>
                <br><br>
                <i class="far fa-address-card fa-2x"></i>
                <input type="text" placeholder="Player Name" name="player_entry" value="">
                <i class="fas fa-key fa-2x"></i>
                <input type="text" placeholder="Password" name="password_entry" value="">
                <input type="submit" name="submit" value="Sign in!"><br>
                <p>Not a member? <a href="registration.php">Sign Up Here!</a></p>
            </form>
       
        </div>
   <?php require_once '../view/footer.php'; ?> 