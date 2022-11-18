<?php

class User {
    public $id;
    public $username;
    public $password;

    public function __construct($id = null, $username=null, $password = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public static function login($username, $password, mysqli $conn) {
        $cmd = "SELECT * FROM User WHERE Username = '".$username."' AND Password = '".$password."'";
        return $conn->query($cmd);
    }
}
?>