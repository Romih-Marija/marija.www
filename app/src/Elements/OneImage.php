<?php
namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DropdownField;

class OneImage extends BaseElement
{
    private static $table_name = 'OneImage';
    private static $singular_name = 'Image';
    private static $plural_name = 'Images';
    private static $description = 'A single image block';

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image',
    ];
    private static $db = [
        'ImageType' => "Enum('vecjaSlika,vecjaVisokaSlika,slika2', 'vecjaSlika')", // Enum za izbiro vrste slike
    ];

      private static $summary_fields = [
        'Thumbnail' => 'Image',
    ];


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Dodamo novo zavihek s sliko
        $fields->addFieldToTab('Root.Main', UploadField::create('Image', 'Upload an image'));
        $fields->removeByName('ImageType');

        // Dodamo Dropdown za izbiro vrste slike
        $fields->addFieldToTab('Root.Main', DropdownField::create(
            'ImageType',
            'Vrsta slike',
            [
                'vecjaSlika' => 'Večja široka slika',
                'vecjaVisokaSlika' => 'Večja visoka slika',
                'slika2' => 'Manjša visoka slika',
            ]
        )->setEmptyString('-- Izberi vrsto slike --'));

        return $fields;
    }

    public function getSummary(): string
    {
        return $this->Image()->exists() ? $this->Image()->Title : 'No image selected';
    }
    public function getThumbnail()
{
    if ($this->Image()->exists()) {
        return $this->Image()->ScaleWidth(100)->CMSThumbnail(); // ali ->URL
    }
    return '(No image)';
}


    public function getType()
    {
        return 'One Image';
    }
}
