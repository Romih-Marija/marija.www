<?php
namespace App\DataObjects;
use SilverStripe\ORM\DataObject;
use App\Elements\GroupMeetingElement;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;

class GroupMeeting extends DataObject implements PermissionProvider
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

    public function providePermissions()
    {
        return [
            'EDIT_GROUPMEETING' => [
                'name' => 'Edit Group Meetings',
                'category' => 'Group Meetings',
                'help' => 'Dovoljuje uporabniku urejanje srečanj lokalnih skupin.',
            ]
        ];
    }
    public function canView($member = null)
    {
        return Permission::check('EDIT_GROUPMEETING', 'any', $member);
    }

    public function canEdit($member = null)
    {
        return Permission::check('EDIT_GROUPMEETING', 'any', $member);
    }
    
}