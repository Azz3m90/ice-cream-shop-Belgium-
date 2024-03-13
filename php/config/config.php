<?php

$mysql_db = new mysqli("ob77jr.myd.infomaniak.com", "ob77jr_gelato", "gelato@Naturale2024!", "ob77jr_gelato_naturale_db");

// Check connection
if ($mysql_db->connect_error) {
    die("Connection failed: " . $mysql_db->connect_error);
}
?>