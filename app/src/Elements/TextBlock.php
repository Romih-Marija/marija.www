<?php
namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\FieldType\DBField;


class TextBlock extends BaseElement
{
    private static $table_name = 'TextBlock';
    
    private static $singular_name = 'Text';

    private static $plural_name = 'Texts';

    private static $description = 'This is my custom element that contains text';

    private static $db = [
        'Text' => 'HTMLText', // Tip naj bo HTMLText, da omogoči shranjevanje HTML vsebine
    ];

    // Funkcija za prikaz polj v CMS
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Dodaj HTMLEditorField za napredno urejanje besedila v CMS
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Text', 'Enter your text here'));

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
