<?php
require($_SERVER['DOCUMENT_ROOT'] . "/loader.php");
session_unset();
session_destroy();
header('Location: index.php');
exit;
?>