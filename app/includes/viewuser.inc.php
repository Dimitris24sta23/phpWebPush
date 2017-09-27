<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 25/9/2017
 * Time: 1:00 μμ
 */

class ViewUser extends User {

    public function showUser($userid){
        $datas = $this->getUser($userid);

        //var_dump($datas);

        if (is_array($datas) || is_object($datas)) {
            foreach ($datas as $data) {
                echo "Device_ID: " . $data['device_id'] . " / User_ID: " . $data['user_id'] . " / Payload: " . $data['payload']. " <a href='#' data-payload='" . $data['payload']. "' class='sendNotification'>Send</a> <br><br>";
            }
        }
    }

}