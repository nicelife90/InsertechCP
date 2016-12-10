<?php

//credentials
$db = [
    "host" => "localhost",
    "user" => "root",
    "pass" => "annexe",
    "port" => "3306",
    "name" => "ced",
];

//instance
$_DB = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
if ($_DB->connect_errno) {
    echo "Échec lors de la connexion à MySQL : (" . $_DB->connect_errno . ") " . $_DB->connect_error;
}
$_DB->query("SET NAMES UTF8");
$_DB->set_charset('utf8');