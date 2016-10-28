<?php

class scoreDB {

    function insert_score($data) {

        $query = $GLOBALS['db']->add("score", $data);
        return $query;
    }

    function select_score_All() {
        $query = $GLOBALS['db']->select("score,team", "", "score.team_id=team.id");
        return $query;
    }

    function updateScore($data1, $data2) {
        $team1 = array("points" => "points+{$data1['point']}", "win" => "win+{$data1['win']}", "lose" => "lose+{$data1['lose']}", "draw" => "draw+{$data1['dram']}");
        $team2 = array("points" => "points+{$data2['point']}", "win" => "win+{$data2['win']}", "lose" => "lose+{$data2['lose']}", "draw" => "draw+{$data2['dram']}");
        $query1 = $GLOBALS['db']->edit("score", $team1, "team_id={$data1['team_id']}");
        $query = $GLOBALS['db']->edit("score", $team2, "team_id={$data2['team_id']}");
        return $query;
    }

}

?>