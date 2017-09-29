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

                echo '<div class="card">';
                echo '<div class="card-header">';
                         echo 'Device ID : '. $data['device_id'];
                echo '</div>';
                echo '<div class="card-body">';
                echo '<h4 class="card-title">User ID: '. $data["user_id"] .'</h4>';
                echo '<p class="card-text">'. $data["payload"].'</p>';
                echo "<a href='#' class='btn btn-primary sendNotification' data-payload='". $data["payload"]."'>Send</a>";
                echo '</div>';
                echo '</div>';
            }
        }
    }

}