<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 25/9/2017
 * Time: 1:00 μμ
 */

class User extends Dbh {

    protected function getAllUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->connect()->query($sql);

        $numRows = $result->num_rows;

        $data = [];
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

    protected function getUser($userid){

        $sql = "SELECT * FROM devices WHERE user_id='".$userid. "'";
        $result = $this->connect()->query($sql);

        $numRows = $result->num_rows;

        $data = [];
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }
    }

}