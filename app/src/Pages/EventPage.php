<?php

namespace App\Pages;
use Page;

use SilverStripe\Forms\DateField;
use SilverStripe\Forms\TextField;

class EventPage extends Page
{
    private static $db = [
        'EventDate' => 'Date',
        'Location' => 'Varchar(255)',
    ];

    private static $allowed_children = []; 

    private static $show_in_sitetree = false; // Skrito v meniju, upravljano znotraj EventHolderja

    private static $can_be_root = false;

    private static $table_name = 'EventPage';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            DateField::create('EventDate', 'Datum dogodka'),
            TextField::create('Location', 'Lokacija'),
        ]);

        return $fields;
    }
}