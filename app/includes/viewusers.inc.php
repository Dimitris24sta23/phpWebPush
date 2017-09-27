<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 25/9/2017
 * Time: 1:00 μμ
 */

class ViewUsers extends User {

    public function showAllUsers(){
        $datas = $this->getAllUsers();

        //var_dump($datas);

        if (is_array($datas) || is_object($datas)) {
            foreach ($datas as $data) {
                echo "ID: " . $data['id'] . " / Email: " . $data['email'] . " / Age: " . $data['age'] ." - <a href='viewUser.php?id=".$data['id']."'>Details</a> <br>";
            }
        }
    }

}