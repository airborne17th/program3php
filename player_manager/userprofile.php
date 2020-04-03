<?php
$the_title = "Profile";
$pathcor = "../";
require_once '../view/header.php';
?>
   <body>
   <h1>Welcome! <?php echo $user_display ?></h1>
      <h2>Add your profile picture here!</h2>
      <form action="index.php" method="POST" enctype="multipart/form-data">
         <input type="hidden" name="action" value="uploadImage"/>
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      <form action="." method="POST">
         <input type="hidden" name="action" value="changeUser"/>
         <span class="error"><?php echo $user_message ?></span><br> 
         <label>Username: </label><br>
        <input type="text" name="newuser" placeholder="Change Username"><br>
         <input type="submit" value="Submit"><br>
      </form>
      <form action="index.php" method="POST">
      <span class="error"><?php echo $pass_message ?></span><br>
         <input type="hidden" name="action" value="changePassword"/>
         <label>Password: </label><br>
        <input type="text" name="newpass" placeholder="Change Password"><br>
         <input type="submit" value="Submit"><br>
      </form>
      <form action="index.php" method="POST">
      <span class="error"><?php echo $email_message ?></span><br>
         <input type="hidden" name="action" value="changeEmail"/>
         <label>E-mail: </label><br>
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