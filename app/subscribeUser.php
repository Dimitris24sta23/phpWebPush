<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 25/9/2017
 * Time: 12:58 μμ
 */

    include 'includes/dbh.inc.php';
    include 'includes/subscribe.inc.php';

    $email = $_POST['email'];
    $age = $_POST['age'];
    $payload = $_POST['payload'];

    $subscription = new Subscription();

    echo $subscription->subscribeUser($email,$age,$payload);

