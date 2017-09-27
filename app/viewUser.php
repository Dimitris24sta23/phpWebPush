<?php
    include 'includes/dbh.inc.php';
    include 'includes/user.inc.php';
    include 'includes/viewuser.inc.php';

    $userid = $_GET['id'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="sendNotification.js"></script>
    </head>
    <body>
    <div>
        <h2>User:</h2>
        <?php
            $users = new ViewUser();
            $users->showUser($userid);
        ?>
    </div>
    </body>
</html>
