<?php

$mysql_db = new mysqli("localhost", "root", "", "gelato_naturale_db");

// Check connection
if ($mysql_db->connect_error) {
    die("Connection failed: " . $mysql_db->connect_error);
}