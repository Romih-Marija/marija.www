<?php
namespace App\DataObjects;
use SilverStripe\ORM\DataObject;
use App\Elements\GroupMeetingElement;

class GroupMeeting extends DataObject
{
    private static $table_name = 'GroupMeeting';

    private static $db = [
        'GroupName' => 'Varchar',
        'Location' => 'Varchar',
        'DateTimeInfo' => 'Varchar',
        'SortOrder' => 'Int',
    ];

    private static $has_one = [
        'Parent' => GroupMeetingElement::class,
    ];

    private static $summary_fields = [
        'GroupName' => 'Skupina',
        'Location' => 'Lokacija',
        'DateTimeInfo' => 'Datum in čas',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('SortOrder');

        return $fields;
    }

    private static $default_sort = 'SortOrder ASC';
}
