<?php
    include 'includes/dbh.inc.php';
    include 'includes/user.inc.php';
    include 'includes/viewusers.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div>
        <h2>Registered Users:</h2>
        <?php
            $users = new ViewUsers();
            $users->showAllUsers();
        ?>
    </div>
    </body>
</html>
