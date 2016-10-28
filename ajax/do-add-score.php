<?php

error_reporting(0);
ini_set('display_errors', 1);
include __DIR__ . "/../include/classes_header.php";
$team1 = "";
$team2 = "";
$score1 = "";
$score2 = "";
$error = '';

if (!isset($_POST['team1']) || empty($_POST['team1'])) {
    $error.="Please Enter team1  <br/>";
} else {
    $team1 = $_POST['team1'];
}
if (!isset($_POST['team2']) || empty($_POST['team2'])) {
    $error.="Please Enter team2  <br/>";
} else {
    $team2 = $_POST['team2'];
}
if (!empty($_POST['team1']) && !empty($_POST['team2'])) {
    if ($_POST['team1'] == $_POST['team2']) {
        $error.="Please Enter  different team  <br/>";
    }
}
if (!isset($_POST['score1'])) {
    $error.="Please Enter score1  <br/>";
} else {
    if (is_numeric($_POST['score1']))
        $score1 = $_POST['score1'];
    else
        $error.="Please Enter score1  numeric <br/>";
}
if (!isset($_POST['score2'])) {
    $error.="Please Enter score2  <br/>";
} else {
    $score2 = $_POST['score2'];
    if (is_numeric($_POST['score2']))
        $score2 = $_POST['score2'];
    else
        $error.="Please Enter scor2  numeric <br/>";
}
if (!empty($error)) {
    echo '<div class="alert alert-danger"><strong>Error!</strong>';
    echo $error;
    echo '</div>';
} else {

    if ($score1 == $score2) {
        $point1 = 1;
        $point2 = 1;
        $win1 = 0;
        $win2 = 0;
        $lose1 = 0;
        $lose2 = 0;
        $dram = 1;
    } elseif ($score1 > $score2) {
        $point1 = $score1;
        $point2 = 0;
        $win1 = 1;
        $win2 = 0;
        $lose1 = 0;
        $lose2 = 1;
        $dram = 0;
    } elseif ($score2 > $score1) {
        $point2 = $score2;
        $point1 = 0;
        $win1 = 0;
        $win2 = 1;
        $lose1 = 1;
        $lose2 = 0;
        $dram = 0;
    }

    $data1 = array("point" => "{$point1}", "win" => "{$win1}", "lose" => "{$lose1}", "dram" => "{$dram}", 'team_id' => "{$_POST['team1']}");
    $data2 = array("point" => "{$point2}", "win" => "{$win2}", "lose" => "{$lose2}", "dram" => "{$dram}", 'team_id' => "{$_POST['team2']}");
    $result = $score->updateScore($data1, $data2);
    if ($result != false) {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            echo '<div class="alert alert-success"><strong>Success!</strong> Team had been Edited...</div>';
        } else {
            echo '<div class="alert alert-success"><strong>Success!</strong> Team had been added...</div>';
        }
    } else {
        echo '<div class="alert alert-danger"><strong>Error!</strong>';
        echo"Can't add this score...";
        echo '</div>';
    }
}
?>
