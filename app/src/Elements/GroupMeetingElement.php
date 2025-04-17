<?php
namespace App\Elements;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use App\DataObjects\GroupMeeting;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class GroupMeetingElement extends BaseElement
{
    private static $table_name = 'GroupMeetingElement';

    private static $has_many = [
        'GroupMeetings' => GroupMeeting::class,
    ];

    private static $owns = [
        'GroupMeetings',
    ];

    private static $inline_editable = false;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortOrder'));

        $grid = GridField::create(
            'GroupMeetings',
            'Srečanja',
            $this->GroupMeetings(),
            $config
        );

        $fields->addFieldToTab('Root.Main', $grid);

        return $fields;
    }

    public function getType()
    {
        return 'Srečanja lokalnih skupin';
    }
    public function getSummary()
    {
        $count = $this->GroupMeetings()->count();
        return "Število terminov: {$count}";
    }
}
