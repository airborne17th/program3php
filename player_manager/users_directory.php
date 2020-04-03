<!-- set per page -->
<?php
$the_title = "User Directory";
$pathcor = "../";

require_once '../view/header.php';
?>


<main>

    <section>
        <table>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($user->getFullName()); ?></td>
                    <td><?php echo htmlspecialchars($user->getUsername()); ?></td>
                    <td><?php echo htmlspecialchars($user->getEmail()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php require_once '../view/footer.php'; ?>       