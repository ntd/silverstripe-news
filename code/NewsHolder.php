<?php

class NewsHolder extends Page {

    private static $icon = 'news/img/folder.png';

    private static $allowed_children = array(
        'NewsPage'
    );

    private static $db = array(
        'AuthorName'  => 'Varchar(128)',
        'AuthorURI'   => 'Varchar(128)',
        'AuthorEmail' => 'Varchar(128)',
    );


    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $field = new TextField('AuthorName',  _t('News.AuthorName'));
        $fields->addFieldToTab('Root.Main', $field, 'Content');

        $field = new TextField('AuthorURI',   _t('News.AuthorURI'));
        $fields->addFieldToTab('Root.Main', $field, 'Content');

        $field = new TextField('AuthorEmail', _t('News.AuthorEmail'));
        $fields->addFieldToTab('Root.Main', $field, 'Content');

        return $fields;
    }


    /**
     * @config
     * @var String $author_name
     */
    private static $author_name = 'silverstripe-news';

    /**
     * @config
     * @var String $author_uri
     */
    private static $author_uri = 'http://silverstripe.entidi.com/';

    /**
     * @config
     * @var String $author_email
     */
    private static $author_email = 'ntd@entidi.it';
}

class NewsHolder_Controller extends Page_Controller {

    private static $allowed_actions = array(
        'feed',
    );


    public function feed() {
        $this->response->addHeader('Content-Type', 'application/atom+xml');
        return $this->renderWith('AtomFeed');
    }
}
