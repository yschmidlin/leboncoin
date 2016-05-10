<?php

function logIP() {
    $sDir = 'log/';
    $sDayFile = date('Y-m-d') . '.log';
    $sLine = date('Y-m-d H:i:s') . '#' . $_SERVER['REMOTE_ADDR'] . "\n";

    if (!file_exists($sDir)) {
        mkdir($sDir);
    }

    file_put_contents($sDir . $sDayFile, $sLine, FILE_APPEND);
}

function connectDB() {
    $aOptions = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"');

    $oPDO = new PDO('mysql:host=127.0.0.1;dbname=leboncoin;charset=UTF8', 'root', '', $aOptions);
    $oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $oPDO;
    /*
      mysql_connect('127.0.0.1', 'root', '');
      mysql_select_db('leboncoin');

      mysql_set_charset('UTF-8');
      mysql_query('SET NAMES "utf8"'); */
}

function closeDB() {
    mysql_close();
}
?>

