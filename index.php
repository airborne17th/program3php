<?php
$the_title = "SC | Home";
$pathcor = "";
require_once 'view/header.php';
?> 
    <div class="container" style="margin-top:30px">
      <div class="row">
        <div class="col-sm-4">
          <h3>Resources</h3>
          <p>Want to brush up on the game? Check out these links to learn more.</p>
          <div class="resources">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="https://www.smashbros.com/en_US/howtoplay/communication.html">Practice online</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://smash.gg/">Smash Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.twitch.tv/directory/game/Super%20Smash%20Bros.%20Ultimate">Watch Live Games</a>
            </li>
          </ul>
        </div>
        <div class="authorImg">
          <h2>About Me</h2>  
          <img src="img/profile.jpg" alt="Picture of Author" height="300" width="200">
          <p>Hey, my name is John Kyker and I'm the creator of this website! I'm a programming student with an interest in strategy games.</p>
        </div>
        
        </div>
        <div class="col-sm-8">
          <h2>Latest News</h2>
          <h5>Local groups band together, March 23, 2020</h5>
          <img src="img/gaming1.jpg" alt="Picture of young players" height="400" width="700">
          <p>Some local players have taken it upon themselves to give donations to and teach younger players.</p>
          <p><a href="#">Learn More</a></p>
          <br>
          <div class="leaderboard">
          <h2>Leaderboard</h2>
          <h5>Top players as updated, April 4, 2020</h5>
          <!-- TO DO turn this into PHP and pull the data from players directory table. Optional -->
          <table>
            <li>Patrick Henrick Record: 10-2</li>
            <li>John Kyker Record 8-3</li>
            <li>Alexander Smith  Record 7-4</li>
          </table>
          </div>
          <h2>Come Play!</h2>
          <img src="img/cafe.jpg" alt="Picture of Cafe" height="400" width="700">
          <p>
            Local play and tournaments are held here unless specified to a different location. Back room of the coffee shop in the expansion area. 
            Friendly games are held on Wedensday starting at 6PM. League matches are held on Saturday or Sunday on agreed upon times.
            Huge thanks to the Brewery crew for hosting us! Please support their fantastic local business.
          </p>
          <p>Address:<br>
          The Brainstorm Brewery<br>
          800 P St<br>
          Lincoln, Nebraska 68508
          </p>
          <p><a href="#">Learn More</a></p>
        </div>
      </div>
    </div>
<?php require_once 'view/footer.php'; ?> 
