<?php
namespace App\Elements;

use SilverStripe\Assets\File;
use SilverStripe\Assets\Storage\AssetContainer;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FileHandleField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use DNADesign\Elemental\Models\BaseElement;

class FileDisplay extends BaseElement
{
    private static $table_name = 'FileDisplay';

    private static $singular_name = 'Datoteka';
    private static $plural_name = 'Datoteke';

    private static $description = 'Element za povezavo na datoteko (npr. plakat, letak ...)';

    private static $db = [
        'FileTitle' => 'Varchar(255)',
        'FileType' => 'Varchar(255)',
    ];

    private static $has_one = [
        'DownloadFile' => File::class,
    ];

    private static $owns = [
        'DownloadFile',
    ];

    private static $inline_editable = false;

    public function getType()
    {
        return 'Datoteka';
    }

    public function getSummary()
    {
        return $this->FileTitle ?: 'datoteka';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('FileType', 'Tip datoteke (npr. Plakat, Letak)'),
            TextField::create('FileTitle', 'Naslov (za prikaz datoteke)'),
            UploadField::create('DownloadFile', 'Datoteka')
                ->setAllowedExtensions(['pdf', 'docx', 'pptx', 'jpg', 'png'])
                ->setDescription('Dodaj datoteko (pdf, docx, pptx, jpg, png)'),
        ]);

        return $fields;
    }
}