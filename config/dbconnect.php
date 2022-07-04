<?php
function connect()
{
    $user = "sql6503851";
    $pass = "ZnymiZ3f13";
    $db = "sql6503851";	
    $mysqli = new mysqli("sql6.freemysqlhosting.net", $user, $pass, $db );

    if ($mysqli->connect_errno )
    {
        die( "Couldn't connect to MySQL" );
    }
    
    return $mysqli;
}
?>
