<?php

require_once 'configuration.php';

$cnt = @mysql_connect("$db_host","$db_user","$db_pass") or die('Unable to establish a DB connection');
mysql_select_db($db_database,$cnt);

?>