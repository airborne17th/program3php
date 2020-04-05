<!-- set per page -->
<?php
$the_title = "SC | Player Directory";
$pathcor = "../";

require_once '../view/header.php';
?>


<main>

    <section>
        <table>
            <tr>
                <th>Name</th>
                <th>Player Name</th>
                <th>Email</th>
            </tr>
            <?php foreach ($players as $player) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($player->getFullName()); ?></td>
                    <td><?php echo htmlspecialchars($player->getPlayerName()); ?></td>
                    <td><?php echo htmlspecialchars($player->getEmail()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php require_once '../view/footer.php'; ?>       