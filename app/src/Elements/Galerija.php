<?php

namespace App\Elements;

use SilverStripe\Assets\Image;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Galerija extends BaseElement
{
    private static $table_name = 'Galerija';

    private static $title = 'Galerija';
    private static $description = 'Element za prikaz galerije';

    private static $many_many = [
        'Slike' => Image::class,
    ];

    private static $owns = [
        'Slike',
    ];

    private static $inline_editable = false;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $upload = UploadField::create('Slike', 'Naloži slike');
        $upload->setFolderName('Galerija/' . $this->ID);
        $upload->setAllowedFileCategories('image/supported');
        $upload->setAllowedMaxFileNumber(50);
        $upload->setIsMultiUpload(true);
        $upload->setDescription('Izberi in naloži več slik hkrati.');

        $fields->addFieldToTab('Root.Main', $upload);

        return $fields;
    }

    public function getType()
    {
        return 'Galerija';
    }

    public function getSummary()
    {
        return 'Število slik: ' . $this->Slike()->count();
    }

    public function getGalerija()
    {
        return $this->Slike();
    }
}
