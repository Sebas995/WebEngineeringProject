<?php

class DB {
    private $user;
    private $pass;
    private $server;
    private $db;

    function __construct($user ="root", $pass = "", $server= "localhost", $db = "ecomerse") {
        $this->user = $user;
        $this->pass = $pass;
        $this->server = $server;
        $this->db = $db;
    }

    function StartDB() {
        $conn = new mysqli($this->server, $this->user, $this->pass, $this->db);
        
        if ($conn->connect_error) {
        
            echo"fallo hermano";
        }
        else {
            echo"funciono hermano";
        }
        
        return $conn;
    }

    function CloseDB($conn) {
        $conn->close();
    }
}