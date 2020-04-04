<?php
require('../model/database.php');
require('../model/user.php');
require('../model/user_db.php');
session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_chars';
    }
}
switch ($action) {
    case 'list_chars':
        $chars = CharDB::getChars();
        include('char_directory.php');
        break;
        }
?>