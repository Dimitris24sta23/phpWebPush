<?php
require __DIR__ . '/webPush/vendor/autoload.php';
use Minishlink\WebPush\WebPush;

// here I'll get the subscription endpoint in the POST parameters
// but in reality, you'll get this information in your database
// because you already stored it (cf. push_subscription.php)
//$subscription = json_decode(file_get_contents('php://input'), true);

$subscription = $_POST['payload'];

//echo $subscription['keys']['auth'];


$auth = array(
    'VAPID' => array(
        'subject' => 'mailto:dimitrisbor@gmail.com',
        'publicKey' => 'BD8SozdRZ5kh_f8yVZk1yluzpJPF3FpanXk9ucrlwoJf2hMMA1R41z7LgO_K3F6QmuUs2EHLBRdPWj4f3xDFzKU',
        'privateKey' => 'BUr-DH12MndQDsuC-ddhK3wVHYuahrfERP_mmKLVai0', // in the real world, this would be in a secret file
    ),
);

$webPush = new WebPush($auth);

$res = $webPush->sendNotification(
    $subscription['endpoint'],
    "Hello!",
    $subscription['keys']['p256dh'],
    $subscription['keys']['auth'],
    true
);

// handle eventual errors here, and remove the subscription from your server if it is expired
