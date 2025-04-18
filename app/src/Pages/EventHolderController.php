<?php

namespace App\Pages;

use PageController;

class EventHolderController extends PageController
{
    protected function init()
    {
        parent::init();
    }
    public function getEvents()
    {

        return $this->Children()->filter([
            'ShowInMenus' => 1
        ])->sort('Date', 'ASC');
    }
}