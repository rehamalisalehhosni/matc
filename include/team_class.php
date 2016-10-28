<?php

class teamDB {

    function insert_team($data) {
        $query = $GLOBALS['db']->addId("team", $data);
        return $query;
    }

    function select_team_All() {
        $query = $GLOBALS['db']->select("team", "", "");
        return $query;
    }

    function delete_team($id) {
        $query = $GLOBALS['db']->edit("team", array("display" => "no"), "product_id=" . $id);
        return $query;
    }


    function check_team($array) {
        $p=$array['name'];
        $query = $GLOBALS['db']->select("team", "", "name like '{$p}'");
        return $query;
    }

}

?>