<?php

class header {

    public static function getMenu($title) {
        $menu = array();
        $db = db::connect();
        $db_response = $db->prepare('SELECT * FROM category');
        $db_response->execute([]);
        $db_response->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $db_response->fetch()) {
            $menu[] = $row;
        }
        return $menu;
    }

}
