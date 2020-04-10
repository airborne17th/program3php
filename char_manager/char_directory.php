<!-- set per page -->
<?php
$the_title = " SC | Character Directory";
$pathcor = "../";

require_once '../view/header.php';
?>
    <section class="box">
        <table>
            <tr>
                <th>Character Name</th>
                <th>Wins</th>
                <th>Losses</th>
                <th>Total Games</th>
            </tr>
            <?php foreach ($chars as $char) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($char->getCharName()); ?></td>
                    <td><?php echo htmlspecialchars($char->getWin()); ?></td>
                    <td><?php echo htmlspecialchars($char->getLoss()); ?></td>
                    <td><?php echo htmlspecialchars($char->getTotal()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php require_once '../view/footer.php'; ?>       