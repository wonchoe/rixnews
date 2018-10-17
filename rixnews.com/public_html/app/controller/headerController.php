<?php

include ROOT . '/app/model/header.php';

class headerController {

    public static function showHeader($title) {
        $menu = header::getMenu($title);
        include ROOT . '/app/view/common/header.php';
    }

}
