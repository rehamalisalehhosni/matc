<?php

  // error_reporting(E_ALL);
// ini_set('display_errors', 1);
    session_start();
    include __DIR__ . "/dblib.php";
    include __DIR__ . "/team_class.php";
    include __DIR__ . "/score_class.php";
    $db = new dbmethods();
    $team = new teamDB();
    $score = new scoreDB();
?>
