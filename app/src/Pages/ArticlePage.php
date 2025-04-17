
<?php 
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DateField;

class ArticlePage extends Page {
    private static $db = [
        'Teaser' => 'Text',
        'Author' => 'Varchar(100)',
        'Date' => 'Date'
    ];
    private static $can_be_root = false;
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        
        $fields->addFieldToTab('Root.Main', TextareaField::create('Teaser', 'Teaser'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Author', 'Author')
            ->setDescription('If multiple authors, separate with commas')
            ->setMaxLength(50), 
            'Content');
        $fields->addFieldToTab('Root.Main', DateField::create('Date', 'Date')
                ->setAttribute('showcalendar', true), 
            'Content');
        
        return $fields;
    }

}