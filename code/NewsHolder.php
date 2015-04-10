<?php

class NewsHolder extends Page {

    private static $icon = 'news/img/folder.png';
    private static $allowed_children = array(
        'NewsPage'
    );
}

class NewsHolder_Controller extends Page_Controller {
}
