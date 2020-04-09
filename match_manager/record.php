<?php
$the_title = "SC | Record Match";
$pathcor = "../";
require_once '../view/header.php';
?>

<div class="row">
<div class="col-sm-6">
<h1>Hello! <?php echo $player_display ?></h1>
<p>Here you can record the results of matches.<p>
<form action="." method="post">
        <h2>Match Record Form</h2>
        <input type="hidden" name="action" value="add_match">
        <span class="error"><?php echo $error_message ?></span><br><br>
        <label>Player1 ID:  </label><br>
        <input type="text" name="player1_ID" placeholder="Enter in player ID"><br>
        <label>Player1 CharacterID:  </label><br>
        <input type="text" name="char1_ID" placeholder="Enter in char ID"><br> 
        <label>Player2 ID:  </label><br>
        <input type="text" name="player2_ID" placeholder="Enter in player ID"><br>
        <label>Player2 CharacterID:  </label><br>
        <input type="text" name="char2_ID" placeholder="Enter in char ID"><br> 
        <label>Winner ID:  </label><br>
        <input type="text" name="winner_ID" placeholder="Enter in winner ID"><br> 
        <input type="submit" value="Submit"><br><br>
    </form>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<p>For reference: </p>
        <table>
            <tr>
                <th>ID</th>
                <th>Player</th>
            </tr>
            <?php foreach ($matchplayers as $matchplayer) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($matchplayer->getID()); ?></td>
                    <td><?php echo htmlspecialchars($matchplayer->getPlayerName()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
<br><br>
        <table>
            <tr>
                <th>ID</th>
                <th>Character Name</th>
            </tr>
            <?php foreach ($matchchars as $matchchar) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($matchchar->getID()); ?></td>
                    <td><?php echo htmlspecialchars($matchchar->getCharName()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>
</div>
<?php require_once '../view/footer.php'; ?> 
