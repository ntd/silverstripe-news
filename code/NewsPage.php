<?php

class NewsPage extends Page {

    private static $icon = 'news/img/microphone.png';
    private static $db = array(
        'Summary'   => 'HTMLText',
        'Author'    => 'Varchar(128)',
        'Published' => 'Date',
    );

    public function getCMSFields() {
        if (! $this->Published) {
            $this->Published = date('Y-m-d');
        }

        $fields = parent::getCMSFields();
        $group = new FieldGroup();
        $fields->addFieldToTab('Root.Main', $group, 'Content');

        $field = new HtmlEditorField('Summary', _t('News.db_Summary'));
        $field->setRows(4);
        $group->push($field);

        $vbox = new CompositeField();
        $group->push($vbox);

        $field = new DateField('Published', _t('News.db_Published'));
        $field->setLocale('it_IT');
        $field->setConfig('dateformat', 'dd/MM/YYYY');
        $field->setConfig('showcalendar', true);
        $vbox->push($field);

        $field = new TextField('Author', _t('News.db_Author'));
        $vbox->push($field);

        return $fields;
    }
}

class NewsPage_Controller extends Page_Controller {
}
