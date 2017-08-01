<?php

namespace App\koli;

class Db{
    Public $conn;
    
    public function __construct()
    {
        $this->conn=mysqli_connect("localhost","root","","ors") or die("database not connected");

    }
}