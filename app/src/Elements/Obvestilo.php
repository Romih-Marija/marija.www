<?php
namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\FieldType\DBField;


class Obvestilo extends BaseElement
{
    private static $table_name = 'Obvestilo';
    
    private static $singular_name = 'Obvestilo';

    private static $plural_name = 'Obvestila';

    private static $description = 'This is my custom element that contains obvestilo';

    private static $db = [
        'Text' => 'HTMLText', // Tip naj bo HTMLText, da omogoči shranjevanje HTML vsebine
    ];

    // Funkcija za prikaz polj v CMS
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Dodaj HTMLEditorField za napredno urejanje besedila v CMS
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Text', 'Napiši obvestilo'));

        return $fields;
    }

    // Funkcija za izpis besedila v elementu
    public function getSummary()
    {
        return DBField::create_field('HTMLText', $this->Text)->Summary(20);
    }

    // Funkcija za pridobivanje besedila
    public function getText()
    {
        return $this->getField('Text');
    }

    // Funkcija za prikaz besedila na strani
    public function getHTMLText()
    {
        return $this->getField('Text');
    }
}
