<?php

namespace App\Pages;
use Page;

use SilverStripe\Lumberjack\Model\Lumberjack;

class EventHolder extends Page
{
    private static $extensions = [
        Lumberjack::class,
    ];

    private static $allowed_children = [
        EventPage::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}