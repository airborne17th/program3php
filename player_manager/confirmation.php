<?php
$the_title = "SC | Confirmation";
$pathcor = "../";
require_once '../view/header.php';
?>
    <body>
        <main>
            <h1>Thanks for Signing Up!</h1>
            <p>Here is the information we have registered.</p>
            <p>First Name: <?php echo $first_name; ?></p>
            <p>Last Name: <?php echo $last_name; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Player Name: <?php echo $player_name; ?></p>
            <p>Password: <?php echo $passTest; ?></p>
     </main>
    </body>
<?php require_once '../view/footer.php'; ?> 

