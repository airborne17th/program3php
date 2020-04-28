<!-- set per page -->
<?php
$the_title = "SC | Player Directory";
$pathcor = "../";

require_once '../view/header.php';
?>
    <section class='box'>
        <table>
            <tr>
                <th>Name</th>
                <th>Player</th>
                <th>Email</th>                
                <th>Wins</th>
                <th>Losses</th>
                <th>Total</th>
            </tr>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($player->getFullName()); ?></td>
                    <td><?php echo htmlspecialchars($player->getPlayerName()); ?></td>
                    <td><?php echo htmlspecialchars($player->getEmail()); ?></td>
                    <td><?php echo htmlspecialchars($player->getWin()); ?></td>
                    <td><?php echo htmlspecialchars($player->getLoss()); ?></td>
                    <td><?php echo htmlspecialchars($player->getTotal()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php require_once '../view/footer.php'; ?>       