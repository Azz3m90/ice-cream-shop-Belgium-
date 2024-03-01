<?php

$mysql_db = new mysqli("gl8l7.myd.infomaniak.com", "gl8l7_siteweb", "2ManyKind4me", "gl8l7_siteweb");

// Check connection
if ($mysql_db->connect_error) {
    die("Connection failed: " . $mysql_db->connect_error);
}
?>