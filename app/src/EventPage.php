<?php

use App\Elements\IzbraniDogodki;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\DateField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Colymba\BulkUpload\Forms\BulkUploadField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;

class EventPage extends Page
{
    private static $db = [
        'DatumOd' => 'Date',
        'DatumDo' => 'Date',
        'Location' => 'Varchar(255)',
        'ImageType' => 'Varchar(255)',
        'SortOrder' => 'Int',
        'EventDatumOverride' => 'Varchar(255)', // če hočeš prikazati nekaj po meri
    ];

    private static $has_one = [
        'SlikaMajhna' => Image::class
    ];
    private static $belongs_many_many = [
        'IzbraniDogodkiRelacija' => \App\Elements\IzbraniDogodki::class,
    ];
    private static $owns = [
        'SlikaMajhna'
    ];

    private static $allowed_children = []; 

    private static $show_in_sitetree = false; // Skrito v meniju, upravljano znotraj EventHolderja

    private static $can_be_root = false;

    private static $table_name = 'EventPage';

    private static $default_parent = EventHolder::class;

    private static $summary_fields = [
        'Title' => 'Naslov',
        'Location' => 'Lokacija',
        'SlikaMajhna.CMSThumbnail' => 'Slika',
    ];

    private static $default_sort = 'DatumDo DESC';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
    

        $folderName = 'Galerija/' . $this->ID; 

        $fields->addFieldsToTab('Root.Main', [
            DateField::create('DatumOd', 'Od datuma'),
            DateField::create('DatumDo', 'Do datuma')
                ->setDescription('Po tem datumu bo dogodek uvrščen med pretekle dogodke.'),
            TextField::create('EventDatumOverride', 'Nadomestni prikaz')
                ->setDescription('Če je izpolnjeno, bo prikazano to besedilo namesto datuma  (npr. "dva termina", "2024/2025").'),
            TextField::create('Location', 'Lokacija'),
            UploadField::create('SlikaMajhna', 'Slika Majhna')
                ->setFolderName($folderName),
        ],
    );
        return $fields;
        
    }
   
    public function getEventStatus()
    {
        $today = date('Y-m-d');
        if ($this->DatumDo && $this->DatumDo < $today) {
            return 'pretekli';
        }
        return 'prihajajoči';
    }

    public function getDisplayDate()
    {
        if ($this->EventDatumOverride) {
            return $this->EventDatumOverride;
        }

        if ($this->DatumOd && $this->DatumDo) {
            if ($this->DatumOd === $this->DatumDo) {
                return date('j.n.Y', strtotime($this->DatumOd));
            }
            return date('j.n.', strtotime($this->DatumOd)) . ' - ' . date('j.n.Y', strtotime($this->DatumDo));
        }

        return null;
    }
    public function getImageTypeClass()
    {
        return $this->ImageType;
    }
 
}