<!-- set per page -->
<?php
$the_title = "SC | Player Directory";
$pathcor = "../";

require_once '../view/header.php';
?>
    <section>
        <table>
            <tr>
                <th>Name</th>
                <th>Player</th>
                <th>Email</th>                
                <th>Wins</th>
                <th>Losses</th>
                <th>Total Games</th>
                <th>Win Rate</th>
            </tr>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($player->getFullName()); ?></td>
                    <td><?php echo htmlspecialchars($player->getPlayerName()); ?></td>
                    <td><?php echo htmlspecialchars($player->getEmail()); ?></td>
                    <td><?php echo htmlspecialchars($player->getWin()); ?></td>
                    <td><?php echo htmlspecialchars($player->getLoss()); ?></td>
                    <td><?php echo htmlspecialchars($player->getTotal()); ?></td>
                    <td>
                    <?php echo htmlspecialchars(number_format((float)$player->getWinRate(), 2, '.', '')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php require_once '../view/footer.php'; ?>       