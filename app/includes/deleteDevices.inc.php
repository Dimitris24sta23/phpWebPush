<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 2/10/2017
 * Time: 12:12 μμ
 */

class Delete extends User{


    // Delete user Devices
    protected function deleteUserDevices($id){

        $sql = "DELETE FROM devices WHERE user_id='". $id . "'";

        if ($this->connect()->query($sql) === TRUE) {
            echo "Devices Deleted";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
        }$this->connect()->close();
    }

    public function deleteDevices($id){

        $this->deleteUserDevices($id);

    }

}