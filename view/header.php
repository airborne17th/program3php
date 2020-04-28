<!DOCTYPE html>
<html lang="en">
    <!-- The head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Website designed for Nintendo Smash Bros">
        <meta name="author" content="John Kyker">
        <link rel="stylesheet" href="<?php echo $pathcor; ?>style.css">
        <link rel="icon" href="<?php echo $pathcor; ?>img/browser.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/80c1c40743.js" crossorigin="anonymous"></script>
        <title><?php echo $the_title; ?></title>
    </head>
    <!-- The body -->
<body>
  <main>
    <div class="jumbotron text-center" id="headerBanner">
      <h1>Smash Central</h1>
      <h3>Play, learn and laugh with a social and competitive group of players.</h3> 
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div>
    <ul class="navbar-nav">
    <li class="nav-item"><a href="<?php echo $pathcor; ?>index.php">Home</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>player_manager?action=list_players">Player List</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>char_manager?action=list_chars">Characters</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>match_manager?action=list_matches">Matches</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>match_manager?action=record_match">Record Match</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>about">About</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>player_manager?action=profile">Profile</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>player_manager?action=registration">Registration</a></li>
    <li class="nav-item"><a href="<?php echo $pathcor; ?>player_manager?action=login_initial">Login Here</a></li>
    </ul>
  </div>  
</nav>
</div>
        