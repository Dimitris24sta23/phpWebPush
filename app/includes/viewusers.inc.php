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
                echo "<th scope='row'>".$data['id']."</th>";
                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['age'] ."</td>";
                echo "<td><a href='viewUser.php?id=".$data['id']."'>Show</a> </td>";
                echo "<td><a href='#' class='deleteDevices' data-id='".$data['id']."'>Delete</a> </td>";
            }
        }
    }

}