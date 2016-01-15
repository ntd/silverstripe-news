<?php

class NewsHolder extends Page
{
    private static $icon = 'news/img/NewsHolder.png';

    private static $allowed_children = array(
        'NewsPage'
    );

    private static $db = array(
        'AuthorName'  => 'Varchar(128)',
        'AuthorURI'   => 'Varchar(128)',
        'AuthorEmail' => 'Varchar(128)',
    );


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $group = new FieldGroup();
        $group->setTitle(_t('News.Author'));
        $group->setDescription(_t('News.AuthorHolder'));
        $fields->addFieldToTab('Root.Main', $group, 'Content');

        $field = new TextField('AuthorName',  _t('News.Name'));
        $group->push($field);

        $field = new TextField('AuthorURI',   _t('News.URI'));
        $group->push($field);

        $field = new TextField('AuthorEmail', _t('News.Email'));
        $group->push($field);

        return $fields;
    }
}

class NewsHolder_Controller extends Page_Controller
{
    private static $allowed_actions = array(
        'feed',
    );


    public function index($request)
    {
        $types = $this->request->getAcceptMimetypes();
        if (is_array($types) && $types[0] == 'application/atom+xml') {
            // An application/atom+xml response has been requested
            return $this->feed();
        }

        // Perform the default action on other requests
        // (there is no parent::index() method to chain-up)
        return $this->getViewer($this->action)->process($this);
    }

    public function feed()
    {
        $this->response->addHeader('Content-Type', 'application/atom+xml');
        return $this->renderWith('AtomFeed');
    }
}
