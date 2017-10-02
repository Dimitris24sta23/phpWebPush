<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 25/9/2017
 * Time: 12:58 μμ
 */

    include 'includes/dbh.inc.php';
    include 'includes/user.inc.php';
    include 'includes/deleteDevices.inc.php';

    $id = $_POST['id'];

    $action = new Delete();

    $action->deleteDevices($id);



