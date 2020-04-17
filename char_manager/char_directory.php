<!-- set per page -->
<?php
$the_title = " SC | Character Directory";
$pathcor = "../";

require_once '../view/header.php';
?>
<div class="col-sm-12">
    <section class="box">
    <h2>Top Characters</h2>
    <table>
            <tr>
                <th>Character</th>
                <th>Wins</th>
                <th>Win Rate</th>
                <th>Total Games</th>
            </tr>
            <?php foreach ($topchars as $char) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($char->getCharName()); ?></td>
                    <td><?php echo htmlspecialchars($char->getWin()); ?></td>
                    <td><?php echo htmlspecialchars(number_format((float)$char->getWinRate(), 2, '.', '')); ?></td>
                    <td><?php echo htmlspecialchars($char->getTotal()); ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    </section>

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
</div>
<?php require_once '../view/footer.php'; ?>       