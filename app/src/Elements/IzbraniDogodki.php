<?php 
namespace App\Elements;
use EventPage;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\ORM\ManyManyList;
use SilverStripe\Forms\CheckboxSetField;

class IzbraniDogodki extends BaseElement
{
    private static $table_name = 'IzbraniDogodki';

    private static $title = 'Izbrani dogodki';
    private static $description = 'Ročno izbrani dogodki iz Lumberjack seznama';

    private static $many_many = [
        'IzbraniDogodkiRelacija' => EventPage::class,
    ];

    private static $owns = ['IzbraniDogodkiRelacija'];

    private static $inline_editable = false;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('IzbraniDogodkiRelacija');
        /*
        $config = GridFieldConfig_RelationEditor::create();
        $grid = GridField::create(
            'IzbraniDogodki',
            'Izberi dogodke',
            $this->IzbraniDogodki(),
            $config
        );

        if ($events = $fields->getFieldByName('IzbraniDogodki')) {
            $events->getConfig()
        }

        $fields->addFieldToTab('Root.Main', $grid);



        $config = GridFieldConfig_RelationEditor::create();
        $grid = GridField::create(
            'IzbraniDogodkiRelacija',
            'Izberi dogodke',
            $this->IzbraniDogodkiRelacija(),
            $config
        );
        */
        $fields->addFieldToTab('Root.Main', GridField::create(
            'IzbraniDogodkiRelacija',
            'Izberi dogodke',
            $this->IzbraniDogodkiRelacija(),
            GridFieldConfig_RelationEditor::create()
            ->removeComponentsByType(GridFieldAddNewButton::class),
        ));

        return $fields;
    }

    public function getType()
    {
        return 'Izbrani dogodki';
    }
    
    public function getIzbraniDogodki()
    {
        return $this->IzbraniDogodkiRelacija(); // ali pa filtrirano, če želiš
    }
}
