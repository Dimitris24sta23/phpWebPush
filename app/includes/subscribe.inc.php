<?php
/**
 * Created by IntelliJ IDEA.
 * User: dborbotsialos
 * Date: 25/9/2017
 * Time: 1:00 μμ
 */

class Subscription extends Dbh {
    // Check if User exists in database of registered users
    protected function checkSubscription($email){
        $sql = "SELECT * FROM users WHERE email='".$email. "'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Insert NEW User in database
    protected function insertUser($email,$age){
        $sql = "INSERT INTO users (email, age) VALUES ('$email','$age')";

        if ($this->connect()->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
        }$this->connect()->close();
    }

    // Get the ID of an existent User
    protected function getUserID($email){
        $sql = "SELECT * FROM users WHERE email='".$email. "'";
        $result = $this->connect()->query($sql);
        foreach ($result as $data) {
            return $data['id'];
        }
    }

    // Insert new subscription to the database
    protected function insertSubscription($userid,$payload){
        $sql = "INSERT INTO devices (user_id, payload) VALUES ('$userid', '$payload')";

        if ($this->connect()->query($sql) === TRUE) {
            echo "New subscription created!";
        } else {
            echo "Error: " . $sql . "<br>" . $this->connect()->error;
        }$this->connect()->close();
    }

    //
    public function subscribeUser($email,$age,$payload){

        if ($this->checkSubscription($email)){ // The user has been registered for at least on device
            echo "User ".$email ." IS subscribed<br>";

            // Add a new device
            $this->insertSubscription($this->getUserID($email), $payload);

        } else { // The user is registering for the first time
            echo "User ".$email ." is NOT subscribed<br>";

            // Add the new user to the database
            $this->insertUser($email,$age);
            // Add this subscription for the user
            $this->insertSubscription($this->getUserID($email), $payload);
        }

    }


}