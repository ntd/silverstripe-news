<?php

class NewsPage extends Page
{

    private static $icon = 'news/img/NewsPage.png';

    private static $db = array(
        'Summary'     => 'HTMLText',
        'AuthorName'  => 'Varchar(128)',
        'AuthorURI'   => 'Varchar(128)',
        'AuthorEmail' => 'Varchar(128)',
        'Published'   => 'Date',
    );

    /**
     * @config
     * @var String The default locale to use for the published date.
     */
    private static $date_locale = 'it_IT';

    /**
     * @config
     * @var String The default date format of the published date.
     */
    private static $date_format = 'dd/MM/YYYY';


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $group = new FieldGroup();
        $group->setTitle(_t('News.Author'));
        $group->setDescription(_t('News.AuthorPage'));
        $fields->addFieldToTab('Root.Main', $group, 'Metadata');

        $field = new TextField('AuthorName',  _t('News.Name'));
        $group->push($field);

        $field = new TextField('AuthorURI',   _t('News.URI'));
        $group->push($field);

        $field = new TextField('AuthorEmail', _t('News.Email'));
        $group->push($field);

        $field = new DateField('Published', _t('News.Published'));
        $field->setDescription(_t('News.PublishedDescription'));
        $field->setLocale($this->config()->date_locale);
        $field->setConfig('dateformat', $this->config()->date_format);
        $field->setConfig('showcalendar', true);
        $fields->addFieldToTab('Root.Main', $field, 'Content');

        $field = new HtmlEditorField('Summary', _t('News.Summary'));
        $field->setRows(4);
        $fields->addFieldToTab('Root.Main', $field, 'Content');

        return $fields;
    }

    public function XHTML_val($field, $arguments = null, $cache = false)
    {
        $html = $this->XML_val($field, $arguments, $cache);
        $doc = new DOMDocument('1.0');
        $doc->strictErrorChecking = false;
        $doc->formatOutput = false;

        try {
            // Prefix with an XML heading to force UTF-8 encoding,
            // otherwise Latin1 would be assumed (what a stupid assumption).
            $doc->loadHTML('<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body>' . $html . '</body>');

            $children = @$doc->getElementsByTagName('body')->item(0)->childNodes;
            if ($children instanceof Traversable) {
                $xml = '';
                foreach ($children as $child) {
                    $xml .= $doc->saveXML($child);
                }
                return $xml;
            }
        } catch (Exception $e) {
        }

        // Fallback value: try to return something useful
        return Convert::html2raw($html);
    }


    public function TXT_val($field, $arguments = null, $cache = false)
    {
        return strip_tags($this->XML_val($field, $arguments, $cache));
    }
}

class NewsPage_Controller extends Page_Controller
{
}
