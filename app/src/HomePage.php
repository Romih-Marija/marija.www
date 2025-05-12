<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class HomePage extends Page
{
    private static $has_one = [
        'HeaderImage' => Image::class,
        'HeaderImageMobile' => Image::class,
    ];

    private static $owns = [
        'HeaderImage',
        'HeaderImageMobile',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Main', [
            UploadField::create('HeaderImage', 'Slika za header'),
            UploadField::create('HeaderImageMobile', 'Slika za header (mobile-view)'), ]
        );

        return $fields;
    }
}