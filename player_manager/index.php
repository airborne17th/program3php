<?php
require('../model/database.php');
require('../model/user.php');
require('../model/user_db.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'registration';
    }
}
switch ($action) {
    case 'list_users':
        $users = UserDB::getUsers();
        include('users_directory.php');
        break;
    case 'registration':
        include('registration.php');
        break;
    case 'add_user':
        // Fetch the data from the registration attempt
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $userTest = filter_input(INPUT_POST, "newuser");
        $passTest = filter_input(INPUT_POST, "newpass");
        
        // Values used for validation
        $validationCounter = 0;
        $isValid = true;

        // Validate the inputs
        if (empty($first_name) || empty($last_name) || empty($userTest) || empty($passTest) ||
            $email === NULL || $email === false) {
                $error_message = "Invalid user data! Check all fields and try again.";
                $isValid = false;
            } else {
            $isValid = true;
            }
        
        // Regex validation
        if (preg_match('/^[A-Za-z]/', $userTest)) {
            } else {
            $error_message = "User must start with a letter.";
            $isValid = false;
            }

        if (preg_match('/^[a-zA-Z\d_-]{4,30}$/', $userTest)) {
            } else {
                $error_message = "User must be within 4 to 30 characters in length. Username cannot have special characters (@$!%*?&).";
                $isValid = false;
            }
        
        if (preg_match('/^.{12,}$/', $passTest)) {
            } else {
                $error_message = "Password must be at least 12 characters long.";
                $isValid = false;
            } 

        if (preg_match('/(?=.*[a-z])/', $passTest)) {
                $validationCounter + 1;
            }
            if (preg_match('/(?=.*[A-Z])/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if (preg_match('/(?=.*\d)/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if (preg_match('/(?=.*[@$!%*?&])/', $passTest)) {
                $validationCounter = $validationCounter + 1;
            }
            if ($validationCounter >= 3) {
            } else {
                $error_message = "Password must have the following, an upper case letter, lower case letter, a digit and a special character.";
                $isValid = false;
            }

            $userResult = UserDB::duplicateUser($userTest);
        // Test for duplicate username
        if ($userResult > 0)
            {
                $error_message = "Username in use.";
                $isValid = false;
            } else {

            }

            $emailResult = UserDB::duplicateEmail($email);
            // Test for duplicate e-mail
            if ($emailResult > 0)
                {
                    $error_message = "E-mail in use.";
                    $isValid = false;
                } else {
    
                }
        // if it valid then insert data into the SQL Database
        if($isValid == true) {
            // Make the password being tested the final password
            $password = $passTest;
            $user_name = $userTest;
            // Create the Session to validate the user is logged in and track name
            $_SESSION["user_name"] = $user_name;
            // Hash it for the server and pass it back to the password
            $hash = password_hash ( $password , PASSWORD_BCRYPT );
            $password = $hash;
            $i = new User($first_name, $last_name, $email, $user_name, $password);
            UserDB::addUser($i);
            include('confirmation.php');
        } else {
            include('registration.php');
        }
        break;
    case 'login_initial':
        $loginerror_message = "";
        include('login.php');    
        break;
    case 'login': 
        $isValid = true;
        $hash = "!";
        $loginerror_message = "";
        $user_entry = filter_input(INPUT_POST, 'user_entry');
        $password_entry = filter_input(INPUT_POST, 'password_entry');
        $hashed_password = UserDB::authenticationUser($user_entry);
        if (isset($hashed_password[0])) {
            $hash = $hashed_password[0];
            trim($hash); 
        }
           

        if(password_verify($password_entry, $hash)){
            $isValid = true;
        } else {
            $isValid = false;
            $loginerror_message = "Login Failed. Check username or password.";
        } 

        if (isset($_SESSION["user_name"]) && $_SESSION["user_name"] !== "!"){
            $isValid = false;
            $loginerror_message = "Login Failed. Already logged in.";
        }

        if ($isValid == true) {
            $_SESSION["user_name"] = $user_entry;
            $loginerror_message = "Login Success!";
            include('login.php');
        } else {
            include('login.php');
        }
        break; 
    case 'logoff' :
       $_SESSION = array();
       session_destroy();
       $loginerror_message = "";
       include('login.php');
       break;
    case 'profile' :
        $user_message = '';
        $pass_message = '';
        $email_message = '';
        if(isset($_SESSION["user_name"])){

        } else {
            // This can never be set by a user naturally with the regex.
            $_SESSION["user_name"] = "!";
        }

        $user = $_SESSION["user_name"];

        if (is_null($user)){
            $error_message = "Not a member? Sign up here!";;
            include('registration.php');
        } 

        if ($user === "!")
        {
            $error_message = "Not a member? Sign up here!";
            include('registration.php');
        } else {
            $user_display = $_SESSION["user_name"];
            include('userprofile.php');
        }
    break;
    case 'changeUser' :
        $oldUser = $_SESSION["user_name"];
        $userTest = filter_input(INPUT_POST, "newuser");
        $userResult = UserDB::duplicateUser($userTest);
        // Test for duplicate username
        if ($userResult > 0)
            {
                $user_message = "Username in use.";
            } else {
                $newUser = $userTest;
                $user_message = "Username successfully updated.";
                UserDB::changeUser($newUser, $oldUser);
                $_SESSION["user_name"] = $newUser;
            }
        $pass_message = '';
        $email_message = '';
        $user_display = $_SESSION["user_name"];
        include('userprofile.php');
    break;   
    case 'changePassword' :
        $passTest = filter_input(INPUT_POST, "newpass");
        $validationCounter = 0;
        $isValid = true;
        if (preg_match('/^.{12,}$/', $passTest)) {
        } else {
            $pass_message = "Password must be at least 12 characters long.";
            $isValid = false;
        } 

        if (preg_match('/(?=.*[a-z])/', $passTest)) {
            $validationCounter + 1;
        }
        if (preg_match('/(?=.*[A-Z])/', $passTest)) {
            $validationCounter = $validationCounter + 1;
        }
        if (preg_match('/(?=.*\d)/', $passTest)) {
            $validationCounter = $validationCounter + 1;
        }
        if (preg_match('/(?=.*[@$!%*?&])/', $passTest)) {
            $validationCounter = $validationCounter + 1;
        }
        if ($validationCounter >= 3) {
        } else {
            $pass_message = "Password must have the following, an upper case letter, lower case letter, a digit and a special character.";
            $isValid = false;
        }

        if ($isValid == true) {
            $password = $passTest;
            $hash = password_hash ( $password , PASSWORD_BCRYPT );
            $user = $_SESSION["user_name"];
            UserDB::changePassword($hash, $user);
            $pass_message = "Password successfully updated";
        } 
        $user_message = '';
        $email_message = '';
        $user_display = $_SESSION["user_name"];
        include('userprofile.php');
        break;
    case 'changeEmail' :
            $emailTest = filter_input(INPUT_POST, "newemail");
            $emailResult = UserDB::duplicateEmail($emailTest);
            if ($emailResult > 0)
            {
            $email_message = "E-mail in use.";
            } else {
            $newEmail = $emailTest;
            $user = $_SESSION["user_name"];
            $email_message = "E-mail successfully updated.";
            UserDB::changeEmail($newEmail, $user);
            }
            $pass_message = '';
            $user_message = '';
            $user_display = $_SESSION["user_name"];
            include('userprofile.php');
        break;        


//    case 'uploadImage' :
//        // array_unique (use this function to enforce unique values for user images.
//        // if (empty($_FILE['image']) == true)
//        // use default.jpg
//        // TO DO: Add the default value of the filename to the column in SQL. 
//        isValid = true; 
//   
//   if(isset($_FILES['image'])){
//    $errors= array();
//    $file_name = $_FILES['image']['name'];
//    $file_size =$_FILES['image']['size'];
//    $file_tmp =$_FILES['image']['tmp_name'];
//    $file_type=$_FILES['image']['type'];
//    $temp = $_FILES['image']['name'];
//    $temp = explode('.', $temp);
//    $temp = end($temp);
//    $file_ext = strtolower($temp);
//    
//    var_dump($_FILES);
//    
//    $extensions= array("jpeg","jpg","png", "gif");
//    
//    if(in_array($file_ext,$extensions)=== false){
//       $errors[]="file extension not in whitelist: " . join(',',$extensions);
//    }
//        if(isValid == true) {
//            $_FILE['image'] = $image;
//            $_SESSION["userID"] = $user_id;
//            UserDB::uploadImage($user_id, $image);
//        }
//    if(empty($errors)==true){
//       move_uploaded_file($file_tmp,"existingDir/".$file_name);
//       echo "Success";
//    }else{
//        var_dump($errors);
//    }
}
?>