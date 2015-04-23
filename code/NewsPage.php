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

        $field = new HtmlEditorField('Summary', _t('News.Summary'));
        $field->setRows(4);
        $group->push($field);

        $vbox = new CompositeField();
        $group->push($vbox);

        $field = new DateField('Published', _t('News.Published'));
        $field->setLocale('it_IT');
        $field->setConfig('dateformat', 'dd/MM/YYYY');
        $field->setConfig('showcalendar', true);
        $vbox->push($field);

        $field = new TextField('Author', _t('News.AuthorName'));
        $vbox->push($field);

        return $fields;
    }

    public function XHTML_val($field, $arguments = null, $cache = false) {
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
                foreach ($children as $child)
                    $xml .= $doc->saveXML($child);
                return $xml;
            }
        } catch (Exception $e) {
        }

        // Fallback value: try to return something useful
        return Convert::html2raw($html);
    }


    public function TXT_val($field, $arguments = null, $cache = false) {
        return strip_tags($this->XML_val($field, $arguments, $cache));
    }
}

class NewsPage_Controller extends Page_Controller {
}
