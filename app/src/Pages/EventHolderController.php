<?php

namespace App\Pages;

use PageController;

class EventHolderController extends PageController
{
    public function getEvents()
    {
        return $this->Children()->filter([
            'ShowInMenus' => 1
        ])->sort('Date', 'ASC');
    }
}