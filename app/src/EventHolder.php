<?php

use SilverStripe\Lumberjack\Model\Lumberjack;
use SilverStripe\Lumberjack\Forms\GridFieldConfig_Lumberjack;
use SilverStripe\Forms\GridField\GridField;

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

        $fields->removeByName('ChildPages');
        
         // Konfiguracija Lumberjack GridFielda z drag-n-drop sortiranjem
        $gridFieldConfig = GridFieldConfig_Lumberjack::create();

        $grid = GridField::create(
            'ChildPages',
            'Dogodki',
            EventPage::get()->filter(['ParentID' => $this->ID]),
            $gridFieldConfig
        );

        $fields->addFieldToTab('Root.Dogodki', $grid);
        return $fields;
    }

}
/*
<?php

use SilverStripe\Lumberjack\Model\Lumberjack;
use EvansHunt\LumberjackSortAndSummary\LumberjackSortAndSummaryExtension;

class EventHolder extends Page
{
    private static $extensions = [
        Lumberjack::class,
        LumberjackSortAndSummaryExtension::class,
    ];

    private static $allowed_children = [
        EventPage::class,
    ];


    private static $lumberjack_sort = 'SortOrder'; 

}
    */