<?php
$the_title = "SC | Profile";
$pathcor = "../";
require_once '../view/header.php';
?>
   <body>
   <!-- <img src="../img/profile_banner.jpg" alt="Login Banner"> -->
   <h1>Welcome! <?php echo $player_display ?></h1>
      <form action="." method="POST">
         <input type="hidden" name="action" value="changeUser"/>
         <span class="error"><?php echo $player_message ?></span><br> 
         <label>Change Player Name: </label><br>
        <input type="text" name="newuser" placeholder="Change Username"><br>
         <input type="submit" value="Submit"><br>
      </form>
      <form action="index.php" method="POST">
      <span class="error"><?php echo $pass_message ?></span><br>
         <input type="hidden" name="action" value="changePassword"/>
         <label>Change Password: </label><br>
        <input type="text" name="newpass" placeholder="Change Password"><br>
         <input type="submit" value="Submit"><br>
      </form>
      <form action="index.php" method="POST">
      <span class="error"><?php echo $email_message ?></span><br>
         <input type="hidden" name="action" value="changeEmail"/>
         <label>Change E-mail: </label><br>
        <input type="text" name="newemail" placeholder="Change Email"><br>
         <input type="submit" value="Submit"><br>
      </form>
      <br>
      <br>
      <br>
      <form action="index.php" method="POST">
      <input type="submit" value="Log Off!" />
      <input type="hidden" name="action" value="logoff"/>
      </form>
   </body>
</html>
<?php require_once '../view/footer.php'; ?> 